<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartiesJoueurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties_joueurs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partie');
            $table->foreign('partie')->references('id')->on('parties');
            $table->unsignedInteger('joueur');
            $table->foreign('joueur')->references('id')->on('joueurs');
            $table->integer('equipe')->nullable();
            $table->integer('classement')->nullable();
            $table->integer('nbPoint')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties_joueurs');
    }
}
