<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('st_user_id')->unsigned();
			$table->integer('st_school_id')->unsigned();
			$table->string('st_class');
            $table->string('st_contact_no');
            $table->string('st_hcyknow');
            $table->string('st_description');
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('students', function (Blueprint $table) {
			$table->foreign('st_user_id')->references('id')->on('users');
			$table->foreign('st_school_id')->references('id')->on('schools');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
