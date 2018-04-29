<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jeux extends Migration
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
            $table->unsignedInteger('interet');
            $table->foreign('interet')->references('id')->on('interet');
            $table->unsignedInteger('etat')->nullable();
            $table->foreign('etat')->references('id')->on('etat');
            $table->unsignedInteger('regle')->nullable();
            $table->foreign('regle')->references('id')->on('regle');
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
