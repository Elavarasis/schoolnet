<?php
namespace App\Http\Controllers\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student_Profile;
use Auth;
use App\User;
use App\School;
use App\Country;
use App\State;
use App\City;
use App\Student;
use Image;
use Redirect;
use DB;

class Home extends Controller
{

    public function index(Request $request)
    {
        $user_id 	= Auth::User()->id;
		$user 		= DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->leftJoin('countries', 'countries.id', '=', 'users.country_id')
						->leftJoin('states', 'states.id', '=', 'users.state_id')
						->leftJoin('cities', 'cities.id', '=', 'users.city')
						->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.email','users.city','students.*','countries.country as country_name','states.name as state_name','cities.city_name')
						->where('users.id', $user_id)
						->first();	
		$countries	= ['0'=>'select'] + Country::where('country_status',1)->orderBy('country')->pluck('country', 'id')->all();
		$states 	= (isset($user)) ? ['0'=>'select'] + State::where('region_id', $user->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id')->all() : array() ;
		$cities 	= (isset($school)) ? ['0'=>'select'] + City::where('state_id', $school->schl_state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id')->all() : array();
		
		return view('student.home',compact('user','countries','states','cities'));
    }
	
	public function getstates(Request $request)
	{
		$country 	= Country::find($request->input('c_id'));
		$states 	= State::where('region_id', $country->id)->where('state_status',1)->get(['id','name']);
		if($request->ajax()){
			$res = response()->json([
				'states' => $states
			]);
			return $res;
		}
	}
	
	/* Get cities by country id through ajax */
	public function getcities(Request $request)
	{
		$state 		= State::find($request->input('s_id'));
		$cities 	= City::where('state_id', $state->id)->where('status',1)->get(['id','city_name']);
		if($request->ajax()){
			$res = response()->json([
				'cities' => $cities
			]);
			return $res;
		}
	}
	
	
	public function save_profile(Student_Profile $request){
		
		$profile_image = '';
		$data = $request->all();
		if($file = $request->hasFile('st_image')) {
		
			$file = $request->file('st_image') ;
			
			$fileName = $file->getClientOriginalName();
			$destinationPath = public_path().'/images/student/' ;
			Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
			Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
			$file->move($destinationPath, IMG_PREFIX.$fileName);
			$profile_image = IMG_PREFIX.$fileName;
		}
			
		$user = ['first_name' => $data['first_name'],
		'last_name' => $data['last_name'],
		'address' => $data['address'],
		'city' => $data['city'],
		'country_id' => $data['country_id'],
		'state_id' => $data['state_id'],
		'dob' => date("Y-m-d", strtotime($data['dob']) ),
		'status' => $data['status']];
		
		if(!empty($profile_image))
			$user['image']=$profile_image;
		
		User::find($data['st_user_id'])->update($user);
		
		$student = ['st_user_id' => $data['st_user_id'],
					'st_contact_no' => $data['st_contact_no'],
					'st_hcyknow' => $data['st_hcyknow'],
					'st_description' => $data['st_description'],
					];

		
		$stud_id = Student::find($data['id'])->update($student);
		
		if(empty($stud_id)){
				DB::rollback();
		}
		DB::commit();
		
		return redirect()->route('stud.home.index')->with('success','Profile updated successfully');
	}
	
	public function reset_password(Request $request){
		
		$data = $request->all();
		
		$this->validate($request, [
            'password' => 'min:4|required',
			'confirm_password' => 'min:4|required|same:password',
			
        ]);
			
		$user = [
				'password' => bcrypt($data['password']),
				];
		
		User::find($data['user_id'])->update($user);
		
		return redirect()->route('stud.home.index')->with('success','Password has been changed successfully');
	}
}