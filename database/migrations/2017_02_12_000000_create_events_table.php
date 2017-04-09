<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
			$table->string('event_description');
            $table->string('event_venue');
            $table->date('event_startDate');
            $table->date('event_endDate');
			$table->string('event_image');
			$table->integer('event_school_id')->unsigned();
			$table->integer('event_status')->default(0);
            $table->timestamps();
        });
		
		//Foreign key constraints
		Schema::table('events', function (Blueprint $table) {
			$table->foreign('event_school_id')->references('id')->on('schools');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
