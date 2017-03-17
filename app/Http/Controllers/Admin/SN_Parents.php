<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Parent_Request;
use App\Http\Controllers\Controller;
use App\Parents;
use App\School;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
use Image;
use Redirect;
class SN_Parents extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$parents = User::where('role', 'parent')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('admin.parents.index',compact('parents'));
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
		$schools 	= School::orderBy('schl_name')->pluck('schl_name', 'id');
		return view('admin.parents.addedit',compact('countries','states','schools'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Parent_Request $request)
    {
        $data = $request->all();
		if($file = $request->hasFile('pa_image')) {
            
				$file = $request->file('pa_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/parent/' ;
				
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
            'role' => 'parent',
			'address' => $data['address'],
			'city' => $data['city'],
			'country_id' => $data['country_id'],
			'state_id' => $data['state_id'],
			'dob' => date("Y-m-d", strtotime($data['dob']) ),
			'image' => (isset($profile_image)) ? $profile_image : '',
        ])->id;
		
		if($user_id){
		
			$pa_id = Parents::create([
							'pa_user_id' => $user_id,
							'pa_school_id' => $data['pa_school_id'],
							'pa_guardian' => $data['pa_guardian'],
							'pa_contact_no' => $data['pa_contact_no'],
							'pa_hcyknow' => $data['pa_hcyknow'],
							'pa_description' => $data['pa_description'],							
							])->id;
			if(empty($pa_id)){
				DB::rollback();
			}
			DB::commit();
			
			return redirect()->route('admin.parents.index')->with('success','Parent added successfully');
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

        $parent = DB::table('users')
				->join('parents', 'parents.pa_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.email','users.status','parents.*')
				->where('users.id', $id)
				->first();
        return view('admin.parents.show',compact('parent'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
		$parent = DB::table('users')
				->join('parents', 'parents.pa_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.city','parents.*')
				->where('users.id', $id)
				->first();
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $parent->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
		$schools 	= School::orderBy('schl_name')->pluck('schl_name', 'id');
        return view('admin.parents.addedit',compact('parent','countries','states','schools'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Parent_Request $request, $id)
    {
		
		$profile_image = '';
		$data = $request->all();
		
		if($file = $request->hasFile('pa_image')) {
		
			$file = $request->file('pa_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/parent/' ;
			
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
		
		DB::beginTransaction();
		
		User::find($data['pa_user_id'])->update($user);
		
		$parent = ['pa_user_id' => $data['pa_user_id'],
					'pa_school_id' => $data['pa_school_id'],
					'pa_contact_no' => $data['pa_contact_no'],
					'pa_hcyknow' => $data['pa_hcyknow'],
					'pa_description' => $data['pa_description'],
					];

		
		$pa_id = Parents::find($id)->update($parent);
		
		if(empty($pa_id)){
				DB::rollback();
		}
		DB::commit();
		
		return redirect()->route('admin.parents.index')->with('success','Parent updated successfully');

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
        return redirect()->route('admin.parents.index')
                        ->with('success','Parent deleted successfully');
    }
	
}