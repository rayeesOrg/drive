<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the messages table
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->integer('conversation_id')->length(10)->unsigned();
            $table->integer('sender_user_id')->length(10)->unsigned(); //Who sent the message
            $table->text('message_content', 3000);
            $table->timestamps();

            $table->foreign('conversation_id')->references('conversation_id')->on('conversations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //To drop messages table
        Schema::drop('messages');
    }
}
