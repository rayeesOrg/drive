<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ////To create the locations table
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('location_id');
            $table->string('town', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //To drop locations table
        Schema::drop('locations');
    }
}
