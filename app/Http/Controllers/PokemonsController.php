<?php

namespace App\Http\Controllers;

use App\PokemonProfiles;

class PokemonsController extends Controller
{
    /**
     * Return pokemons view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pokemons = PokemonProfiles::all()->sortByDesc(function($item){
            return $item->informations['weight'];
        })->paginate(5);

        return view('pokemons', compact('pokemons'));
    }

    /**
     * Return Json with the Pokeking
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function pokeking()
    {
        $pokemons = PokemonProfiles::all();
        $best_base_stats = 0;
        $pokeking = null;

        foreach ($pokemons as $pokemon){
            $total_base_stats = 0;

            foreach ($pokemon->informations['stats'] as $stat){
                $total_base_stats += $stat['base_stat'];
            }

            // Check if total stats is bigger than best stats
            if ($total_base_stats > $best_base_stats)
            {
                $best_base_stats = $total_base_stats;
                $pokeking = $pokemon;
            }
        }

        // Return the pokemon with the best base stats
        return response()->json([
           'pokeking' => $pokeking
        ]);
    }
}