<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\School_Admin_Request;
use App\Http\Requests\School_Request;
use App\Http\Controllers\Controller;
use App\School_admin;
use App\School;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
use Image;
use Redirect;
use Input;

class School_admins extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$school_admins = User::where('role', 'tenant')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('admin.school_admins.index',compact('school_admins'));
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
		$countries	= Country::where('country_status',1)->pluck('country', 'id' );
		$states		= array();
		$cities		= array();
		return view('admin.school_admins.addedit',compact('countries','states','cities'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(School_Admin_Request $request)
    {
        $data = $request->all(); 
		$profile_image = '';
		if($file = $request->hasFile('profile_image')) {
            
			$file = $request->file('profile_image') ;
			
			$fileName = $file->getClientOriginalName();
			$destinationPath = public_path().'/images/tenant/' ;
			Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
			Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
			$file->move($destinationPath, IMG_PREFIX.$fileName);
			$profile_image = IMG_PREFIX.$fileName;
		}
		DB::beginTransaction();	
		$user_id = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city' => $data['city'],
            'role' => 'tenant',
            'password' => bcrypt($data['password']),
			'dob' => date("Y-m-d", strtotime($data['dob']) ),
			'image' => $profile_image
        ])->id;
		
		if($user_id){	
		
			$sa_id = School_admin::create([
							'user_id' => $user_id,
							'designation' => $data['designation'],
							'phone' => $data['phone'],
							'mobile' => $data['mobile'],
							'website' => $data['website'],
							])->id;
			if(empty($sa_id)){
				DB::rollback();
			}
			DB::commit();	
			return redirect()->route('admin.school_admins.index')->with('success','School admin added successfully');
		}
		
    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)
    {

        $school_admin = DB::table('users')
				->join('school_admin', 'school_admin.user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.email','users.status','users.country_id','users.state_id','users.image','users.dob','school_admin.*')
				->where('users.id', $id)
				->first();
        return view('admin.school_admins.show',compact('school_admin'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
		$school_admin = DB::table('users')
				->join('school_admin', 'school_admin.user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.city','users.image','users.dob','school_admin.*')
				->where('users.id', $id)
				->first();
				
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $school_admin->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');	
		$cities 	= City::where('state_id', $school_admin->state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id');
		return view('admin.school_admins.addedit',compact('school_admin','countries','states','cities'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(School_Admin_Request $request, $id)
    {
		
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

		
		$sa_id = School_admin::find($id)->update($sc_admin);
		if(empty($sa_id)){
				DB::rollback();
		}
		DB::commit();
		
		return redirect()->route('admin.school_admins.index')->with('success','School admin updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {	

        User::find($id)->update(['status'=>'2']);

        return redirect()->route('admin.school_admins.index')

                        ->with('success','School admin deleted successfully');

    }
	
	public function school($admin_id){
			
		//$admin_id => id of 'users' tble.
		$school 	= DB::table('schools')->where('schl_user_id', $admin_id)->first();
		$countries	= Country::where('country_status',1)->orderBy('country')->pluck('country', 'id');
		$states 	= (isset($school)) ? State::where('region_id', $school->schl_country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id') : array() ;
		$cities 	= (isset($school)) ? City::where('state_id', $school->schl_state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id') : array();
        return view('admin.school_admins.manage-school',compact('school','admin_id','countries','states','cities'));
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
		
		$school_id 	= School::updateOrCreate([
            'id'=>$data['id']
			],[
            'schl_user_id' => $data['admin_id'],
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
		return redirect()->route('admin.school_admins.index')->with('success','School data updated successfully');
		
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
	
}