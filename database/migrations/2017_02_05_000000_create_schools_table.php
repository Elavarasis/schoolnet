<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('schl_user_id')->unsigned();
			$table->string('schl_name');
			$table->integer('schl_country_id')->unsigned();
			$table->integer('schl_state_id')->unsigned();
			$table->integer('schl_city_id')->unsigned();
			$table->string('schl_address');
			$table->string('schl_contact_no');
			$table->string('schl_email');
			$table->string('schl_level');
			$table->text('schl_features');
			$table->string('schl_logo');
			$table->integer('schl_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('schools', function (Blueprint $table) {
			$table->foreign('schl_user_id')->references('id')->on('users');
			$table->foreign('schl_country_id')->references('id')->on('countries');
			$table->foreign('schl_state_id')->references('id')->on('states');
			$table->foreign('schl_city_id')->references('id')->on('cities');
		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schools');
    }
}
