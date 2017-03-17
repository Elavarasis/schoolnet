<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {

            $table->increments('id');
            $table->string('city_name');
			$table->integer('state_id')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->integer('status')->default(0);
            $table->timestamps();

        });
		
		//Foreign key constraints
		Schema::table('cities', function (Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries');
			$table->foreign('state_id')->references('id')->on('states');
		});
		
		DB::table('cities')->insert(
						array(
							'city_name' => 'Trivandrum',
							'state_id' => 1313,
							'country_id' => 356
						)
					);
					
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("cities");
    }
}
