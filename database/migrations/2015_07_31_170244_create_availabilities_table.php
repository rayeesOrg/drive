<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the availabilities table
        Schema::create('availabilities', function (Blueprint $table) {
            $table->increments('availability_id');
            $table->string('location_id');
            $table->string('instructor_id');
            $table->date('date');
            $table->time('available_from');
            $table->time('available_to');
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
        //To drop availabilities table
        Schema::drop('availabilities');
    }
}
