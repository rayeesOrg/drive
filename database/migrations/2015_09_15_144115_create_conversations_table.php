<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the conversations table
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('conversation_id');
            $table->string('subject', 30);
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
        //To drop conversations table
        Schema::drop('conversations');
    }
}
