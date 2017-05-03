<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee', function (Blueprint $table) {
            $table->increments('id');
			$table->string('fee_name');
			$table->double('fee_amount');
			$table->string('fee_description');
			$table->integer('fee_school_id')->unsigned();
			$table->integer('fee_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('fee', function (Blueprint $table) {
			$table->foreign('fee_school_id')->references('id')->on('schools');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fee');
    }
}
