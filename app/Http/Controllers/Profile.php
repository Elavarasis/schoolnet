<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Normal_user;
use App\City;
use App\Country;
use App\State;
use App\User;
use App\Course;
use App\Course_tutor;
use App\School;
use App\School_user;
use DB;
use Image;
use Redirect;
class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school_id	= 	Auth::user()->school_id;
		
		//$courses 	= 	Course::where('course_status','<>',2)->where('course_school_id',$school_id)->orderBy('course_title', 'asc')->get();
		return view('profile');
    }
	
	public function help(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school_id	= 	Auth::user()->school_id;
		
		//$courses 	= 	Course::where('course_status','<>',2)->where('course_school_id',$school_id)->orderBy('course_title', 'asc')->get();
		return view('help');
    }
	
	public function update(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$user 		=	User::find($user_id);
		/*$user = DB::table('users')
				->join('normal_users', 'normal_users.nu_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.city','normal_users.*')
				->where('users.id', $user_id)
				->first();*/
				
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states	= $cities = array();
		
		/*if($user->country_id > 0){
			$states 	= State::where('region_id', $user->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
		}
		
		if($user->state_id > 0){
			$cities 	= City::where('state_id', $user->state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id');
		}*/
		
		return view('update_profile',compact('user','countries','states','cities'));
    }
	
	public function doupdate(Request $request)
    {
		
	}
	
}