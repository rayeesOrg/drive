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

            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('instructor_id')->references('instructor_id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
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
