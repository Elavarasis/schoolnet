<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use DB;
use Image;
use Redirect;

class Home extends Controller
{

    public function index(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		return view('home');
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