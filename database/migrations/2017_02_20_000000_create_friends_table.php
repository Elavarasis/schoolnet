<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('frnd_user_id')->unsigned();
			$table->integer('frnd_friend_id')->unsigned();
			$table->integer('frnd_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('friends', function (Blueprint $table) {
			$table->foreign('frnd_user_id')->references('id')->on('users');
		});
		
		Schema::table('friends', function (Blueprint $table) {
			$table->foreign('frnd_friend_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friends');
    }
}
