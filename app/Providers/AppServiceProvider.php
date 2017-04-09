<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Student;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('stud_regno', function($attribute, $value, $parameters) {
			$school_id 	= Input::get('st_school_id');
			$st_user_id = Input::get('st_user_id');
			$student	= array();
			//update process
			if($st_user_id > 0 && $school_id > 0){
				$student = Student::where('st_reg_no', $value)->where('st_school_id', $school_id)->where('st_user_id','!=', $st_user_id)->first();
			} else if($school_id > 0) { //insert process
				$student = Student::where('st_reg_no', $value)->where('st_school_id', $school_id)->first();
			}
			
			if(count($student) > 0){
				return false;
			} else {
				return true;
			}
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
