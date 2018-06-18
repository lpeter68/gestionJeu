<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartiesExtensions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties_extensions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partie');
            $table->foreign('partie')->references('id')->on('parties');
            $table->unsignedInteger('extension');
            $table->foreign('extension')->references('id')->on('extensions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties_extensions');
    }
}
