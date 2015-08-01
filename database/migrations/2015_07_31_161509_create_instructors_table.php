<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the instructors table
        Schema::create('instructors', function (Blueprint $table) {
            $table->increments('instructor_id');
            $table->string('user_id')->unique();
            $table->string('company_id');
            $table->string('vehicle_id')->unique();
            $table->string('title', 10);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('dob');
            $table->string('address', 50);
            $table->string('town', 25);
            $table->string('county', 25);
            $table->string('postcode', 15);
            $table->string('mob_no', 15);
            $table->string('tel_no', 15);
            $table->string('all_locations'); //Stores all the locations of an instructor
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //To drop instructors table
        Schema::drop('instructors');
    }
}
