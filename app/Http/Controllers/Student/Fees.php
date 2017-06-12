<?php
namespace App\Http\Controllers\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\School;
use App\Fee;
use App\Fee_student;
use App\Fee_paid;
use App\Option;
use DB;

class Fees extends Controller
{
	public function get_fee()
	{
		$user_id	= 	Auth::user()->id;
		$fee_students = 	Fee_student::where('fs_user_id',$user_id)->get();
		return view('student.fee.index',compact('fee_students'));

	}
}