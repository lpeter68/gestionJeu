<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Parties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('jeu');
            $table->foreign('jeu')->references('id')->on('jeux');
            $table->date('date');
            $table->integer('nbJoueur')->nullable();
            $table->integer('nbEquipes')->nullable();
            $table->integer('duree')->nullable();
            $table->string('divers')->nullable(); //Type de règle, scénario choisis etc
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
