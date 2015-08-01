<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To create the companies table
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('name')->unique();
            $table->string('address', 50);
            $table->string('town', 25);
            $table->string('county', 25);
            $table->string('postcode', 15);
            $table->string('mob_no', 15);
            $table->string('tel_no', 15);
            $table->integer('no_of_instructors'); //Stores all the locations of an instructor
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
        //To drop companies table
        Schema::drop('companies');
    }
}
