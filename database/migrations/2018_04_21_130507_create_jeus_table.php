<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJeusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom')->unique();
            $table->string('edition')->nullable();
            $table->integer('date_edition')->nullable();
            $table->string('remarque')->nullable();
            $table->integer('nombre_joueur_min')->nullable();
            $table->integer('nombre_joueur_max')->nullable();
            $table->string('age')->nullable();
            $table->integer('temps_jeu')->nullable();
            $table->boolean('hasard')->nullable();
            $table->boolean('strategie')->nullable();
            $table->boolean('des')->nullable();
            $table->boolean('cartes')->nullable();
            $table->boolean('adresse')->nullable();
            $table->boolean('questions')->nullable();
            $table->boolean('lettres')->nullable();
            $table->boolean('chiffres')->nullable();
            $table->boolean('equipes')->nullable();
            $table->boolean('cooperation')->nullable();
            $table->boolean('memoire')->nullable();
            $table->boolean('argent')->nullable();
            $table->boolean('point_victoire')->nullable();
            $table->string('interet')->nullable();
            $table->string('etat')->nullable();
            $table->string('regle')->nullable();
            $table->string('mise_en_place')->nullable();
            $table->string('pieces_manquantes')->nullable();
            $table->string('divers')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeux');
    }
}
