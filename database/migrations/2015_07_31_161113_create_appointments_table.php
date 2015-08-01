<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the appointments table
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('appointment_id');
            $table->string('instructor_id');
            $table->string('learner_id');
            $table->date('app_date');
            $table->time('app_start_time');
            $table->time('app_finish_time');
            $table->timestamps();

            $table->foreign('instructor_id')->references('instructor_id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('learner_id')->references('learner_id')->on('learners')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //To drop appointments table
        Schema::drop('appointments');
    }
}
