<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Teacher_Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\School;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
use Image;
use Redirect;
class Teachers extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$teachers = User::where('role', 'teacher')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('admin.teachers.index',compact('teachers'));
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
		$schools 	= ['0'=>'Please select'] + School::orderBy('schl_name')->pluck('schl_name', 'id')->all();
		return view('admin.teachers.addedit',compact('countries','states','cities','schools'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Teacher_Request $request)
    {
		
        $data = $request->all();
		
		if($file = $request->hasFile('te_image')) {
            
				$file = $request->file('te_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/teacher/' ;
				
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
            'role' => 'teacher',
			'address' => $data['address'],
			'city' => $data['city'],
			'country_id' => $data['country_id'],
			'state_id' => $data['state_id'],
			'dob' => date("Y-m-d", strtotime($data['dob']) ),
			'image' => (isset($profile_image)) ? $profile_image : '',
        ])->id;
		
		if($user_id){
		
			$teacher_id = Teacher::create([
							'te_user_id' => $user_id,
							'te_school_id' => $data['te_school_id'],
							'te_contact_no' => $data['te_contact_no'],
							'te_profession' => $data['te_profession'],
							'te_skillset' => $data['te_skillset'],
							'te_level' => $data['te_level'],
							'te_hcyknow' => $data['te_hcyknow'],							
							])->id;
			if(empty($teacher_id)){
				DB::rollback();
			}
			DB::commit();
			
			return redirect()->route('admin.teachers.index')->with('success','Teacher added successfully');
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

        $teacher = DB::table('users')
				->join('teachers', 'teachers.user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.email','users.status','teachers.*')
				->where('users.id', $id)
				->first();
        return view('admin.teachers.show',compact('teacher'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
		$teacher = DB::table('users')
				->join('teachers', 'teachers.te_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.city','teachers.*')
				->where('users.id', $id)
				->first();
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $teacher->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
		$cities 	= City::where('state_id', $teacher->state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id');
		$schools 	= ['0'=>'Please select'] + School::orderBy('schl_name')->pluck('schl_name', 'id')->all();

		return view('admin.teachers.addedit',compact('teacher','countries','states','cities','schools'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Teacher_Request $request, $id)
    {
		
		$profile_image = '';
		$data = $request->all();
		
		if($file = $request->hasFile('te_image')) {
		
			$file = $request->file('te_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/teacher/' ;
			
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
			$teacher['image']=$profile_image;
		
		DB::beginTransaction();
		
		User::find($data['te_user_id'])->update($user);
		
		$teacher = ['te_user_id' => $data['te_user_id'],
					'te_school_id' => $data['te_school_id'],
					'te_contact_no' => $data['te_contact_no'],
					'te_profession' => $data['te_profession'],
					'te_skillset' => $data['te_skillset'],
					'te_level' => $data['te_level'],
					'te_hcyknow' => $data['te_hcyknow'],
					];
		
		$teacher_id = Teacher::find($id)->update($teacher);
		
		if(empty($teacher_id)){
				DB::rollback();
		}
		DB::commit();
		
		return redirect()->route('admin.teachers.index')->with('success','Teacher updated successfully');

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
        return redirect()->route('admin.teachers.index')
                        ->with('success','Teacher deleted successfully');
    }
	
	/* Get parents by school id through ajax */
	public function getparents(Request $request)
	{
		//$state 		= State::find($request->input('s_id'));
		
		$parents = DB::table('users')
				->join('parents', 'parents.pa_user_id', '=', 'users.id')
				->select(DB::raw('CONCAT(first_name, " ", last_name) AS parent_name'),'parents.id')
				->where('users.role', 'parent')
				->where('users.status', 1)
				->orderBy('users.first_name')
				->where('parents.pa_school_id', $request->input('sh_id'))
				->get();
				
				
		//$cities 	= User::where('pa_school_id', $request->input('s_id'))->where('status',1)->get(['id','city_name']);
		if($request->ajax()){
			$res = response()->json([
				'parents' => $parents
			]);
			return $res;
		}
	}
	
}