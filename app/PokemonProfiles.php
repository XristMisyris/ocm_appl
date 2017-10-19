<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokemonProfiles extends Model
{
    protected $fillable = ['informations'];

    protected $table = 'pokemon_profiles';

    protected $casts = ['informations' => 'array'];

    public $timestamps = false;
}
