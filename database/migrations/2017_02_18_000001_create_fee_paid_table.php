<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeepaidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_paid', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('fp_user_id')->unsigned();
			$table->integer('fp_fee_id')->unsigned();
			$table->double('fp_amount');
			$table->string('fp_description');
			$table->integer('fp_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('fee_paid', function (Blueprint $table) {
			$table->foreign('fp_user_id')->references('id')->on('users');
		});
		
		Schema::table('fee_paid', function (Blueprint $table) {
			$table->foreign('fp_fee_id')->references('id')->on('fee');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fee_paid');
    }
}
