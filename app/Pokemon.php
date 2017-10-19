<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = ['url', 'name'];

    protected $table = 'pokemons';

    public $timestamps = false;

    public function infos()
    {
        return $this->hasOne(PokemonProfiles::class, 'pokemon_id');
    }
}
