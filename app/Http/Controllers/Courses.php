<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\Course;
use App\Course_tutor;
use App\School;
use App\School_user;
use DB;
use Image;
use Redirect;
class Courses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
		$user_id		= 	(isset(Auth::user()->id)) ? Auth::user()->id : 0;
		$school_id		= 	(isset(Auth::user()->school_id)) ? Auth::user()->school_id : 0;
		$query			= 	Course::where('course_status',1)->where('course_parent',0)->orderBy('course_title', 'asc');	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$allcourses		= 	$query->get();
		
		unset($query);
		
		$query			= 	Course::where('course_status',1)->where('course_featured',1)->where('course_parent',0)->orderBy('id', 'desc');	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$featured_courses = 	$query->get();
		
		return view('course_list',compact('allcourses','featured_courses'));
    }
	
    public function view($id)
    {
		$user_id	= 	(isset(Auth::user()->id)) ? Auth::user()->id : 0;
		$school_id	= 	(isset(Auth::user()->school_id)) ? Auth::user()->school_id : 0;
		$query		= 	Course::where('course_status',1)->where('course_parent',0)->orderBy('course_title', 'asc');
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		
		$allcourses	= 	$query->get();
		$single		= 	Course::where('course_status',1)->where('course_parent',0)->where('id',$id)->first();
		
		return view('course_view',compact('allcourses','single'));
    }
	
	public function tutors($course_id)
    {
		$user_id		= 	(isset(Auth::user()->id)) ? Auth::user()->id : 0;
		$school_id		= 	(isset(Auth::user()->school_id)) ? Auth::user()->school_id : 0;
		$query			= 	Course::where('course_status',1)->where('course_parent',0)->orderBy('course_title', 'asc');	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$allcourses		= 	$query->get();
		
		$alltutors		= 	Course_tutor::where('ct_course_id',$course_id)->get();		
		return view('course_tutors',compact('alltutors','allcourses'));
    }
	
	public function tutor($tutor_id)
    {
		$user_id		= 	(isset(Auth::user()->id)) ? Auth::user()->id : 0;
		$school_id		= 	(isset(Auth::user()->school_id)) ? Auth::user()->school_id : 0;
		$query			= 	Course::where('course_status',1)->where('course_parent',0)->orderBy('course_title', 'asc');	
							if($school_id){
								$query->where('course_school_id',$school_id);
							}
		$allcourses		= 	$query->get();
		
		$user			= 	User::find($tutor_id);
		return view('course_tutor_profile',compact('user','allcourses'));
    }
	
	
	
}