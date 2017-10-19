<?php

namespace App\Http\Controllers;

use App\PokemonProfiles;

class PokemonsController extends Controller
{
    public function index()
    {
        $pokemons = PokemonProfiles::all()->sortByDesc(function($item){
            return $item->informations['weight'];
        })->paginate(5);

        return view('pokemons', compact('pokemons'));
    }
}