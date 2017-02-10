<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_admin', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->string('designation');
            $table->date('dob');
            $table->string('phone');
            $table->string('mobile');
            $table->string('website');
			$table->string('image');
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
        Schema::drop('users');
    }
}
