<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('te_user_id')->unsigned();
			$table->integer('te_school_id')->unsigned();
            $table->string('te_contact_no');
			$table->string('te_profession');
			$table->string('te_skillset');
			$table->integer('te_level');
            $table->string('te_hcyknow');
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('teachers', function (Blueprint $table) {
			$table->foreign('te_user_id')->references('id')->on('users');
			$table->foreign('te_school_id')->references('id')->on('schools');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers');
    }
}
