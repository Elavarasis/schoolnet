<?php
namespace App\Http\Controllers\Student;
use Illuminate\Http\Request;
use App\Http\Requests\Student_Request;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use Auth;
use App\Student;
use Image;
use Redirect;

class Calendars extends Controller
{
    public function index(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	Student::where('st_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->st_school_id : 0;
		
		$allevents 			= Event::orderBy('id', 'desc')->where('event_status',1)->where('event_school_id',$school_id)->get();
		$cur_month_events 	= Event::where(DB::raw('MONTH(event_startDate)'), '=', date('n'))
								->where('event_school_id',$school_id)
								->orderBy('id', 'desc')
								->get();								
		return view('student.calendar.index',compact('allevents','cur_month_events'));
    }
	
}