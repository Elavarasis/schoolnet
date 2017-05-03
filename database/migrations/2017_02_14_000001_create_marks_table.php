<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('mrk_user_id')->unsigned();
			$table->integer('mrk_reg_no');
			$table->string('mrk_exam_name');
			$table->string('mrk_subject');
			$table->double('mrk_total_mark');
			$table->double('mrk_pass_mark');
			$table->double('mrk_mark_got');
			$table->date('mrk_date');
			$table->integer('mrk_status')->default(0);
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
        Schema::drop('marks');
    }
}
