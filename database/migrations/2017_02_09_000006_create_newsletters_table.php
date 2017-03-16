<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('nl_user_id')->nullable()->unsigned();
			$table->string('nl_email');
			$table->integer('nl_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('newsletters', function (Blueprint $table) {
			$table->foreign('nl_user_id')->references('id')->on('users');
		});
		
		
		//Temporary section
		/*for($i=1;$i<=14;$i++){
			$email = 'ela10192@gmail.com';
			if(($i % 2) == 0) $email = 'jobingrg4@gmail.com';
			DB::table('newsletters')->insert(array('nl_email' => $email, 'nl_status' => 1));
		}*/
		//Temporary section
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('newsletters');
    }
}
