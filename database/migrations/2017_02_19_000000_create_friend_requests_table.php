<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_requests', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('freq_user_id')->unsigned();
			$table->integer('freq_to_user_id')->unsigned();
			$table->string('freq_response');
			$table->integer('freq_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('friend_requests', function (Blueprint $table) {
			$table->foreign('freq_user_id')->references('id')->on('users');
		});
		
		Schema::table('friend_requests', function (Blueprint $table) {
			$table->foreign('freq_to_user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friend_requests');
    }
}
