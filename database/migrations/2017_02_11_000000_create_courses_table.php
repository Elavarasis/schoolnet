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
            $table->string('course_description');
            $table->string('course_duration');
            $table->double('course_fee');
			$table->integer('course_parent')->default(0);
			$table->string('course_image');
			$table->integer('course_status')->default(0);
            $table->timestamps();
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
