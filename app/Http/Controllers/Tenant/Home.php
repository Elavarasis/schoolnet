<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\School_Request;
use Auth;
use App\User;
use App\School;
use App\Country;
use App\State;
use App\City;
use App\Option;
use App\School_admin;
use Image;
use Redirect;
use DB;

class Home extends Controller
{

    public function index(Request $request)
    {
        $user_id 	= Auth::User()->id;
		$user 		= DB::table('users')
						->join('school_admin', 'school_admin.user_id', '=', 'users.id')
						->leftJoin('countries', 'countries.id', '=', 'users.country_id')
						->leftJoin('states', 'states.id', '=', 'users.state_id')
						->leftJoin('cities', 'cities.id', '=', 'users.city')
						->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.email','users.city','school_admin.*','countries.country as country_name','states.name as state_name','cities.city_name')
						->where('users.id', $user_id)
						->first();				
		$school		= School::where('schl_user_id', $user_id)->first();
		$school_id 	= (isset($school)) ? $school->id : 0;
		$countries	= ['0'=>'select'] + Country::where('country_status',1)->orderBy('country')->pluck('country', 'id')->all();
		
		$school_states 	= (isset($school)) ? ['0'=>'select'] + State::where('region_id', $school->schl_country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id')->all() : array() ;
		
		$school_cities 	= (isset($school)) ? ['0'=>'select'] + City::where('state_id', $school->schl_state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id')->all() : array();
		
		$user_states 	= (isset($user)) ? ['0'=>'select'] + State::where('region_id', $user->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id')->all() : array() ;
		
		$user_cities 	= (isset($user)) ? ['0'=>'select'] + City::where('state_id', $user->state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id')->all() : array();
		
		//get classes/divisions by school id
		$classes 	= DB::table('options')
						->select(array(
							'opt_key',
							DB::raw('GROUP_CONCAT(DISTINCT opt_text SEPARATOR "|") as divisions')
							))
						->groupBy('opt_key')
						->where('opt_type','=','division')
						->first();
		
		//get attendance markers by school id
		$attendance_markers	= DB::table('options')
						->select(array(
							'opt_key',
							DB::raw('GROUP_CONCAT(DISTINCT opt_text SEPARATOR "|") as markers')
							))
						->groupBy('opt_key')
						->where('opt_type','=','attentance_marker')
						->first();
		
		return view('tenant.home',compact('user','school','countries','school_states','school_cities','user_states','user_cities','attendance_markers','classes'));
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
	
	
	public function save_school(School_Request $request){
		
		$data = $request->all(); 
			
		//Upload logo if exists
		if($file = $request->hasFile('schl_logo')) {
				$file = $request->file('schl_logo') ;
				$fileName = $file->getClientOriginalName();
				$destinationPath = public_path().'/images/school/' ;
				
				Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
				Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
				$file->move($destinationPath, IMG_PREFIX.$fileName);
				$schl_logo = IMG_PREFIX.$fileName;
		}
		
		//Update if data exist else Insert new record
		$school 	= School::find($data['id']);
		$old_logo 	= (!empty($school)) ? $school->schl_logo : '';
		$schl_logo 	= (isset($schl_logo)) ? $schl_logo : $old_logo;
		
		$school 	= School::updateOrCreate([
            'id'=>$data['id']
			],[
            'schl_user_id' => Auth::User()->id,
			'schl_name' => $data['schl_name'],
			'schl_country_id' => $data['schl_country_id'],
			'schl_state_id' => $data['schl_state_id'],
			'schl_city_id' => $data['schl_city_id'],
			'schl_address' => $data['schl_address'],
			'schl_contact_no' => $data['schl_contact_no'],
			'schl_email' => $data['schl_email'],
			'schl_level' => $data['schl_level'],
			'schl_features' => $data['schl_features'],
			'schl_logo' => $schl_logo,
			'schl_status' => $data['schl_status']
        ]);
		
		//Save Data into options table
		Option::where('opt_key',$school->id)->delete(); //remove old data of this school
		
		$options	=	array();
		if($data['schl_classes']){
			$schl_classes = explode('|',$data['schl_classes']);
			foreach($schl_classes as $class){
				$options[] = [
							'opt_key' => $school->id,
							'opt_text' => trim($class),
							'opt_type' => 'division'
							];
			}
		}
		
		if($data['schl_attendance_markers']){
			$attendance_markers = explode('|',$data['schl_attendance_markers']);
			foreach($attendance_markers as $marker){
				$options[] = [
							'opt_key' => $school->id,
							'opt_text' => trim($marker),
							'opt_type' => 'attentance_marker'
							];
			}
		}
		
		DB::table('options')->insert($options);
		
		return redirect()->route('tenant.home.index')->with('success','School Profile updated successfully');
		
	}
	
	public function save_profile(Request $request){
		
		$profile_image = '';
		$data = $request->all();
		if($file = $request->hasFile('profile_image')) {
		
			$file = $request->file('profile_image') ;
			
			$fileName = $file->getClientOriginalName();
			$destinationPath = public_path().'/images/tenant/' ;
			Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
			Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
			$file->move($destinationPath, IMG_PREFIX.$fileName);
			$profile_image = IMG_PREFIX.$fileName;
		}
			
		$user = [
		'first_name' => $data['first_name'],
		'last_name' => $data['last_name'],
		'country_id' => $data['country_id'],
		'state_id' => $data['state_id'],
		'city' => $data['city'],
		'dob' => date("Y-m-d", strtotime($data['dob']) ),
		'status' => $data['status']];
		
		if(!empty($profile_image))
			$user['image']=$profile_image;
		
		DB::beginTransaction();	
		
		User::find($data['user_id'])->update($user);
		
		$sc_admin = [
		'user_id' => $data['user_id'],
		'designation' => $data['designation'],
		'phone' => $data['phone'],
		'mobile' => $data['mobile'],
		'website' => $data['website']
		];

		
		$sa_id = School_admin::find($data['id'])->update($sc_admin);
		if(empty($sa_id)){
				DB::rollback();
		}
		DB::commit();
		
		return redirect()->route('tenant.home.index')->with('success','Profile updated successfully');
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
		
		return redirect()->route('tenant.home.index')->with('success','Password has been changed successfully');
	}
}