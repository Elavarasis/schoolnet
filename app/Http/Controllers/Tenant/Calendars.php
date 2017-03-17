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
		$events = Event::orderBy('id', 'desc')->get();
		return view('tenant.calendar.index',compact('events'));
    }
	
}