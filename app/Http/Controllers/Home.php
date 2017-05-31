<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\Course;
use DB;
use Image;
use Redirect;

class Home extends Controller
{

    public function index(Request $request)
    {
		$user_id		= 	(isset(Auth::user()->id)) ? Auth::user()->id : 0;
		$school_id		= 	(isset(Auth::user()->school_id)) ? Auth::user()->school_id : 0;
		
		$query			= 	Course::where('course_status','<>',2)->where('course_featured',1)->where('course_parent',0)->orderBy('id', 'desc');	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$featured_courses 	= 	$query->get();
		
		unset($query);
		
		$query			= 	Course::where('course_status','<>',2)->where('course_parent',0)->orderBy('id', 'desc')->take(7);	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$courses_list1 	= 	$query->get();
		
		unset($query);
		
		$query			= 	Course::where('course_status','<>',2)->where('course_parent',0)->orderBy('id', 'desc')->skip(6)->take(7);	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$courses_list2 	= 	$query->get();
		
		return view('welcome',compact('featured_courses','courses_list1','courses_list2'));
    }


    public function dologin()
    {
		$userdata = array (
						'email' => Input::get('e'),
						'password' => Input::get('p')
					);
		
		If (Auth::attempt ($userdata)) {
			$return = array(
						'status' => 'success',
						'message' => 'You are successfully Logged in'
					);
		} else {
			$return = array(
						'status' => 'error',
						'message' => 'Given credentials are invalid'
					);
		}
		
		echo json_encode($return);
    }
	
}