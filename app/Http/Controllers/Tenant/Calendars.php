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
		$allevents 			= Event::orderBy('id', 'desc')->get();
		$cur_month_events 	= Event::where('event_startDate','2017-03-27')->orderBy('id', 'desc')->get();
		return view('tenant.calendar.index',compact('events','cur_month_events'));
    }
	
}