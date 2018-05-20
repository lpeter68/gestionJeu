<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Extension extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extensions', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jeuDeBase');
            $table->foreign('jeuDeBase')->references('id')->on('jeux');
            $table->unsignedInteger('extension');
            $table->foreign('extension')->references('id')->on('jeux');
            $table->integer('numeroExtension')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extensions');
    }
}
