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

	
}