<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pokemon_id')->unsigned();
            $table->foreign('pokemon_id')->references('id')->on('pokemons');
            $table->json('informations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_profiles');
    }
}
