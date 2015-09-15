<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the participants table
        Schema::create('participants', function (Blueprint $table) {
            $table->integer('conversation_id')->length(10)->unsigned();
            $table->integer('user_id')->length(10)->unsigned();
            $table->boolean('is_read');
            $table->boolean('is_starred');
            $table->timestamps();

            $table->primary(['conversation_id', 'user_id']);
            $table->foreign('conversation_id')->references('conversation_id')->on('conversations')->onDelete('cascade')->onUpdate('cascade');
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
        //To drop participants table
        Schema::drop('participants');
    }
}
