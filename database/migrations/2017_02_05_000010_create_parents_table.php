<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('pa_user_id')->unsigned();
            $table->string('pa_mother_fname');
            $table->string('pa_mother_lname');
			$table->integer('pa_school_id')->unsigned();
			$table->integer('guardian')->default(0);
            $table->string('pa_contact_no');
            $table->string('pa_hcyknow');
            $table->string('pa_description');
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('parents', function (Blueprint $table) {
			$table->foreign('pa_user_id')->references('id')->on('users');
			$table->foreign('pa_school_id')->references('id')->on('schools');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parents');
    }
}
