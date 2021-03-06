<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Joueur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joueurs', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('surnom')->unique();
            $table->unsignedInteger('applicationUser')->nullable();;
            $table->foreign('applicationUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joueurs');
    }
}
