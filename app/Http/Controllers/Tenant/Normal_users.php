<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\Normal_User_Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Normal_user;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
use Image;
use Redirect;
class Normal_users extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$normal_users = User::where('role', 'normal_user')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('tenant.normal_users.index',compact('normal_users'));
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
		return view('tenant.normal_users.addedit',compact('countries','states','cities'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Normal_User_Request $request)
    {
		
        $data = $request->all();
		
		if($file = $request->hasFile('nu_image')) {
            
			$file = $request->file('nu_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/normal_user/' ;
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
            'password' => bcrypt($data['password']),
            'status' => $data['status'],
            'role' => 'normal_user',
			'address' => $data['address'],
			'city' => $data['city'],
			'country_id' => $data['country_id'],
			'state_id' => $data['state_id'],
			'dob' => date("Y-m-d", strtotime($data['dob']) ),
			'image' => (isset($profile_image)) ? $profile_image : '',
        ])->id;
		
		if($user_id){
		
			$nu_user_id = Normal_user::create([
							'nu_user_id' => $user_id,
							'nu_class' => $data['nu_class'],							
							'nu_contact_no' => $data['nu_contact_no'],
							'nu_hcyknow' => $data['nu_hcyknow'],
							'nu_description' => $data['nu_description'],
							'nu_created_by' => Auth::user()->id,							
							])->id;
			if(empty($nu_user_id)){
				DB::rollback();
			}
			DB::commit();	
			return redirect()->route('tenant.normal_users.index')->with('success','Normal user added successfully');
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

        $normal_user = DB::table('users')
				->join('normal_users', 'normal_users.nu_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.email','users.status','normal_users.*')
				->where('users.id', $id)
				->first();
        return view('tenant.normal_userss.show',compact('normal_user'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
		$normal_user = DB::table('users')
				->join('normal_users', 'normal_users.nu_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.city','normal_users.*')
				->where('users.id', $id)
				->first();
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $normal_user->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
   		$cities 	= City::where('state_id', $normal_user->state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id');

		return view('tenant.normal_users.addedit',compact('normal_user','countries','states','cities'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Normal_User_Request $request, $id)
    {

		$profile_image = '';
		$data = $request->all();
		
		if($file = $request->hasFile('nu_image')) {
		
			$file = $request->file('nu_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/normal_user/' ;
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
			$normal_user['image']=$profile_image;
		
		DB::beginTransaction();	

		User::find($data['nu_user_id'])->update($user);
		
		$normal_user = ['nu_user_id' => $data['nu_user_id'],
					'nu_class' => $data['nu_class'],
					'nu_contact_no' => $data['nu_contact_no'],
					'nu_hcyknow' => $data['nu_hcyknow'],
					'nu_description' => $data['nu_description'],
					];

		
		$nu_user_id = Normal_user::find($id)->update($normal_user);
		if(empty($nu_user_id)){
				DB::rollback();
		}
		DB::commit();
			
		return redirect()->route('tenant.normal_users.index')->with('success','Normal user updated successfully');

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
        return redirect()->route('tenant.normal_users.index')
                        ->with('success','Normal user deleted successfully');
    }
	
}