<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the companies table
        Schema::create('images', function (Blueprint $table) {
            $table->increments('image_id');
            $table->integer('instructor_id')->length(10)->unsigned();
            $table->string('name', 10);
            $table->timestamps();

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
        //To drop companies table
        Schema::drop('images');
    }
}
