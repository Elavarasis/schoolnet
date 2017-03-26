<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('lv_user_id')->unsigned();
			$table->integer('lv_applicant')->unsigned();
			$table->string('lv_totaldays');
			$table->date('lv_start_date');
			$table->string('lv_start_time');
            $table->date('lv_end_date');
			$table->string('lv_end_time');
            $table->longText('lv_reason');
			$table->integer('lv_user_del')->default(0);
			$table->integer('lv_parent_del')->default(0);
			$table->integer('lv_tenant_del')->default(0);
			$table->integer('lv_status')->default(0);
			$table->longText('lv_remarks');
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('leaves', function (Blueprint $table) {
			$table->foreign('lv_user_id')->references('id')->on('users');
		});
		
		Schema::table('leaves', function (Blueprint $table) {
			$table->foreign('lv_applicant')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leaves');
    }
}
