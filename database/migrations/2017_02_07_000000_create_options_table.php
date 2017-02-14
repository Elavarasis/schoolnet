<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Option;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
			$table->string('opt_key');
			$table->text('opt_text');
			$table->string('opt_image');
			$table->string('opt_type');
			$table->integer('opt_status')->default(0);
            $table->timestamps();
        });
		
		
		//Insert widgets keys if not exists
		$widget_keys 	= [
							['paypal','Paypal','payment'],
							['payumoney','PayUMoney','payment'],
							['w1','','widget'],
							['w2','','widget'],
							['w3','','widget'],
							['w4','','widget'],
							['w5','','widget'],
						  ];
						  
		$widget_keys 	= array_filter($widget_keys);
		
		if(!empty($widget_keys)){
			foreach($widget_keys as $widget){
				if(!Option::where('opt_key', '=', $widget[0])->exists()) { //check if data exists
					DB::table('options')->insert(
						array(
							'opt_key' => $widget[0],
							'opt_text' => $widget[1],
							'opt_type' => $widget[2]
						)
					);
				}
			}
		}
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('options');
    }
}
