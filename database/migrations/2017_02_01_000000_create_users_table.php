<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
			$table->string('role');
			$table->string('address');
			$table->string('city');
			$table->integer('country_id')->unsigned()->nullable();
			$table->integer('state_id')->unsigned()->nullable();
			$table->date('dob');
            $table->string('image'); 
			$table->integer('status')->default(0);
			$table->rememberToken();
            $table->timestamps();
        });
		//Foreign key constraints
		Schema::table('users', function (Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries');
			$table->foreign('state_id')->references('id')->on('states');
		});
		
		DB::table('users')->insert(
						array(
							'first_name' => 'ela',
							'last_name' => 's',
							'email' => 'admin@gmail.com',
							'password' => bcrypt('admin123'),
							'role' => 'superadmin',
							'image' => 'user.png'
						)
					);
					
					
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
