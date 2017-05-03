<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_students', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('fs_fee_id')->unsigned();
			$table->integer('fs_user_id')->unsigned();
			$table->integer('fs_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('fee_students', function (Blueprint $table) {
			$table->foreign('fs_fee_id')->references('id')->on('fee');
			$table->foreign('fs_user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fee_students');
    }
}
