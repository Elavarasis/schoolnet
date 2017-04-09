<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttentanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attentances', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('att_user_id')->unsigned();
			$table->integer('att_reg_no');
			$table->date('att_date');
			$table->string('att_attentance');
			$table->integer('att_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('attentances', function (Blueprint $table) {
			$table->foreign('att_user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attentances');
    }
}
