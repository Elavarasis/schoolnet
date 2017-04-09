<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\Student_Request;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use Image;
use Redirect;

class Calendars extends Controller
{
    public function index(Request $request)
    {
		$allevents 			= Event::orderBy('id', 'desc')->where('event_status',1)->get();
		$cur_month_events 	= Event::where('event_startDate', '>=' ,date('Y-m-d'))
								->where(DB::raw('MONTH(event_startDate)'), '=', date('n'))
								->orderBy('id', 'desc')->get();								
		return view('tenant.calendar.index',compact('allevents','cur_month_events'));
    }
	
}