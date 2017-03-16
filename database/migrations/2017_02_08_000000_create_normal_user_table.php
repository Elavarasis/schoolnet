<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('normal_users', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('nu_user_id')->unsigned();
			$table->string('nu_class');
            $table->string('nu_contact_no');
            $table->string('nu_hcyknow');
            $table->string('nu_description');
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('normal_users', function (Blueprint $table) {
			$table->foreign('nu_user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('normal_users');
    }
}
