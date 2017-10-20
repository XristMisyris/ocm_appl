<?php

namespace App\Console\Commands;

use App\Pokemon;
use App\PokemonProfiles;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchPokemonsProfiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemons:fetch-profiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all pokemons profiles';

    /**
     * Guzzle Client
     *
     * @var Client
     */
    protected $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Fetching pokemons profiles. Please wait...This may take a while.');
        $this->fetchPokemonsProfiles();
        $this->info('All pokemons profiles have been fetched!!');
    }

    public function fetchPokemonsProfiles()
    {
        $pokemons = Pokemon::all();

        foreach ($pokemons as $pokemon)
        {
            $pokemon_url = $pokemon->url;
            $body = $this->client->request('GET', $pokemon_url)->getBody();
            $data = json_decode($body);

            if($data->height >= 50 && $data->sprites->front_default !== null){
                $pokemon_info = new PokemonProfiles(['informations' => $data]);
                $pokemon->infos()->save($pokemon_info);
            }
        }
    }
}
