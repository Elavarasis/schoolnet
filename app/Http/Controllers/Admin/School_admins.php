<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
//use Illuminate\Http\School_Admin_Request;
use App\Http\Requests\School_Admin_Request;
use App\Http\Controllers\Controller;
use App\School_admin;
use App\School;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
use Redirect;

class School_admins extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$school_admins = User::where('role', 'school_admin')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('admin.school_admins.index',compact('school_admins'));
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
		return view('admin.school_admins.addedit');
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
		$user_id = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'role' => 'school_admin',
            'password' => bcrypt($data['password']),
        ])->id;
		
		if($user_id){
			
			if($file = $request->hasFile('profile_image')) {
            
				$file = $request->file('profile_image') ;
				
				$fileName = rand().'@@'.$file->getClientOriginalName();
				$destinationPath = public_path().'/images/school_admin/' ;
				$file->move($destinationPath,$fileName);
				$profile_image = $fileName ;
			}
		
			$user_id = School_admin::create([
							'user_id' => $user_id,
							'designation' => $data['designation'],
							'dob' => date("Y-m-d", strtotime($data['dob']) ),
							'phone' => $data['phone'],
							'mobile' => $data['mobile'],
							'website' => $data['website'],
							'image' => $profile_image
							])->id;
				
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
				->select('users.first_name','users.last_name','users.email','users.status','school_admin.*')
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
				->select('users.first_name','users.last_name','users.status','school_admin.*')
				->where('users.id', $id)
				->first();		
				
        return view('admin.school_admins.addedit',compact('school_admin'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)
    {

   		$this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
			//'email' => 'required|email|max:255|unique:users,'.$id,
			'designation' => 'required|max:255',
			'dob' => 'required|date_format:d/m/Y',
			'phone' => 'numeric',
			'mobile' => 'required|numeric',
			'website' => 'url|max:255',
			'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
		$profile_image = '';
		$data = $request->all();
		$user = ['first_name' => $data['first_name'],
		'last_name' => $data['last_name'],
		'status' => $data['status']];
		User::find($data['user_id'])->update($user);
		
		if($file = $request->hasFile('profile_image')) {
            
				$file = $request->file('profile_image') ;
				
				$fileName = rand().'@@'.$file->getClientOriginalName();
				$destinationPath = public_path().'/images/school_admin/' ;
				$file->move($destinationPath,$fileName);
				$profile_image = $fileName ;
			}
		
		$sc_admin = [
		'user_id' => $data['user_id'],
		'designation' => $data['designation'],
		'dob' => date("Y-m-d", strtotime($data['dob']) ),
		'phone' => $data['phone'],
		'mobile' => $data['mobile'],
		'website' => $data['website']
		];
		if(!empty($profile_image))
			$sc_admin['image']=$profile_image;
		
		School_admin::find($id)->update($sc_admin);

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
	
	public function save_school(Request $request){
		
		$data = $request->all(); 
		
		//Set Custom Attribute names for validation
		$customAttributes = array(
						'schl_name' => 'School Name',
						'schl_country_id' => 'Country',
						'schl_state_id' => 'State',
						'schl_city_id' => 'City',
						'schl_contact_no' => 'Contact Number',
						'email' => 'Email'
						);
		
		//Do validation
		//$this->validate(Request $request, $rules, $messages, $customAttributes) //syntax
		$this->validate($request,[
				'schl_name' => 'required|max:255',
				'schl_country_id' => 'required|numeric',
				'schl_state_id' => 'required|numeric',
				'schl_city_id' => 'required|numeric',
				'schl_contact_no' => 'numeric',
				'email' => 'email|max:255',
			],[],$customAttributes);
			
		//Upload logo if exists
		if($file = $request->hasFile('schl_logo')) {
				$file = $request->file('schl_logo') ;
				$fileName = rand().'@@'.$file->getClientOriginalName();
				$destinationPath = public_path().'/images/school/' ;
				$file->move($destinationPath,$fileName);
				$schl_logo = $fileName;
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