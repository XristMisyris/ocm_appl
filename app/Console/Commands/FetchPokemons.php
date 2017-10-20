<?php

namespace App\Console\Commands;

use App\Pokemon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchPokemons extends Command
{
    /**
     * Base PokeAPI Url
     */
    const URL = 'https://pokeapi.co/api/v2/pokemon/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemons:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all pokemons from Pokeapi V2';

    /**
     * Guzzle Client
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
        $this->info('Fetching pokemons. Please wait...');
        $this->fetchPokemon(self::URL);
        $this->info('All pokemons have been fetched!!');
    }

    /**
     * Fetch all pokemons from PokeAPI
     *
     * @param $url
     */
    public function fetchPokemon($url)
    {
        $body = $this->client->request('GET', $url)->getBody();
        $data = json_decode($body);

        foreach ($data->results as $result)
        {
            $pokemon = new Pokemon();
            $pokemon->name = $result->name;
            $pokemon->url = $result->url;
            $pokemon->save();
        }

        // Fetch next page if exists
        if ($data->next !== null)
        {
            $this->fetchPokemon($data->next);
        }
    }
}
