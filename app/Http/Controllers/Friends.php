<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\School;
use App\School_user;
use App\Friend_request;
use App\Friend;
use DB;

class Friends extends Controller
{

    public function index(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school_id	= 	Auth::user()->school_id;
		
		$active_users	= 	DB::table('users')
							->leftJoin('students', 'students.st_user_id', '=', 'users.id')
							->leftJoin('parents', 'parents.pa_user_id', '=', 'users.id')
							->leftJoin('teachers', 'teachers.te_user_id', '=', 'users.id')
							->select('users.*')
							->where('users.id', '<>', $user_id)
							->where('users.role', '<>', 'superadmin')
							//->where('students.st_school_id', $school_id)
							//->orWhere('parents.pa_school_id', $school_id)
							//->orWhere('teachers.te_school_id', $school_id)
							->get();

		return view('friends',compact('active_users','user_id'));
    }


    public function search_nonfriends(Request $request)
    {	
		$data = $request->all();
		
		$user_id	= 	Auth::user()->id;
		$school_id	= 	Auth::user()->school_id;
		
		$active_users	= 	DB::table('users')
							->leftJoin('students', 'students.st_user_id', '=', 'users.id')
							->leftJoin('parents', 'parents.pa_user_id', '=', 'users.id')
							->leftJoin('teachers', 'teachers.te_user_id', '=', 'users.id')
							->select('users.*')
							->where('users.id', '<>', $user_id)
							->where('users.role', '<>', 'superadmin')
							->where(function($query) use ($data) {
								$query->where('users.first_name', 'like' , $data['s'].'%')
									->orWhere('users.last_name', 'like' , $data['s'].'%');
							})
							/*->where(function($query) use ($school_id) {
								$query->where('students.st_school_id', $school_id)
									->orWhere('parents.pa_school_id', $school_id)
									->orWhere('teachers.te_school_id', $school_id);
							})*/
							->get();
							
		return view('ajax_search_nonfriends',compact('active_users','user_id'));			
				
    }
	
	
	public function send_friend_req(Request $request)
    {	
		$user_id= 	Auth::user()->id;
		$data 	= 	$request->all();
		
		$request_id 	= Friend_request::updateOrCreate([
            'freq_user_id'=>$user_id,
			'freq_to_user_id'=>$data['r']
			],[
            'freq_user_id' => $user_id,
			'freq_to_user_id' => $data['r'],
			'freq_response' => 'pending',
			'freq_status' => 0,
        ]);		
				
    }
	
	public function accept_friend_req(Request $request)
    {	
		$user_id	= 	Auth::user()->id;
		$data 		= 	$request->all();
		
		//updating friend request status as 'accepted'
		$requestData = ['freq_response' => 'accepted'];
		Friend_request::find($data['r'])->update($requestData);
		
		//Add firend in the friends table
		$friend_id 	= Friend::updateOrCreate([
            'frnd_user_id'=>$data['u'],
			'frnd_friend_id'=>$user_id
			],[
            'frnd_user_id'=>$data['u'],
			'frnd_friend_id'=>$user_id,
			'frnd_status' => 1,
        ]);
    }
	
	public function testing(Request $request)
	{
		$userdata = array (
						'username' => Input::get('username'),
						'password' => Input::get('password')
					);
		
		If (Auth::attempt ($userdata)) {
			//authentication success
			//return Redirect::to('home');
			echo 'success';
		} else {
			echo 'fail';
		}
		
	}
	
}