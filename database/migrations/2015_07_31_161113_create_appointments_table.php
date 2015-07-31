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
