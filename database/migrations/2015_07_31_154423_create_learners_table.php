<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the learners table
        Schema::create('learners', function (Blueprint $table) {
            $table->increments('learner_id');
            $table->string('user_id')->unique();
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
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //To drop learners table
        Schema::drop('learners');
    }
}
