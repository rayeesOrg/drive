<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the appointments table
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('learner_id')->length(10)->unsigned();
            $table->integer('instructor_id')->length(10)->unsigned();
            $table->integer('rating')->length(1)->unsigned();
            $table->longText('review');
            $table->timestamps();

            $table->foreign('learner_id')->references('learner_id')->on('learners')->onDelete('cascade')->onUpdate('cascade');
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
        //To drop reviews table
        Schema::drop('reviews');
    }
}
