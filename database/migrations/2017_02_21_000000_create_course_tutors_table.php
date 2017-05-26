<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_tutors', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('ct_course_id')->unsigned();
			$table->integer('ct_user_id')->unsigned();
			$table->integer('ct_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('course_tutors', function (Blueprint $table) {
			$table->foreign('ct_course_id')->references('id')->on('courses');
		});
		
		Schema::table('course_tutors', function (Blueprint $table) {
			$table->foreign('ct_user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_tutors');
    }
}
