<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Label extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
        });
        Schema::create('etat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
        });
        Schema::create('regle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interet');
        Schema::dropIfExists('etat');
        Schema::dropIfExists('regle');
    }
}
