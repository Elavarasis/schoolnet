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
		$user_id	= 	Auth::user()->id;
		$school_id	= 	Auth::user()->school_id;
		
		$courses 	= 	Course::where('course_status','<>',2)->where('course_school_id',$school_id)->orderBy('course_title', 'asc')->get();
		//return view('admin.cities.index',compact('cities'));
    }


    public function view($id)
    {
		$user_id	= 	Auth::user()->id;
		$school_id	= 	Auth::user()->school_id;
		
		$allcourses	= 	Course::where('course_status',1)->where('course_school_id',$school_id)->where('course_parent',0)->orderBy('course_title', 'asc')->get();
		$single		= 	Course::where('course_status',1)->where('course_school_id',$school_id)->where('course_parent',0)->where('id',$id)->first();
		
		return view('course_view',compact('allcourses','single'));
    }
	
	public function tutors($course_id)
    {
		$alltutors	= 	Course_tutor::where('ct_course_id',$course_id)->get();		
		return view('course_tutors',compact('alltutors'));
    }
	
	public function tutor($tutor_id)
    {
		$user	= 	User::find($tutor_id);
		return view('course_tutor_profile',compact('user'));
    }
	
	
	
}