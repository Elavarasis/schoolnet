<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_title');
			$table->string('course_slug');
			$table->string('course_short_desc');
            $table->string('course_description');
            $table->string('course_duration');
            $table->double('course_fee');
			$table->integer('course_parent')->default(0);
			$table->string('course_image');
			$table->string('course_video_url');
			$table->integer('course_school_id')->unsigned();
			$table->integer('course_featured')->default(0);
			$table->integer('course_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('courses', function (Blueprint $table) {
			$table->foreign('course_school_id')->references('id')->on('schools');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
