<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\Student_Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Parents;
use App\Student;
use App\School;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
use Image;
use Redirect;

class Students extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;
		
		$students = User::where('role', 'student')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('tenant.students.index',compact('students','school_id'));
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
		$parents	= array();
		return view('tenant.students.addedit',compact('countries','states','cities','schools','parents'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Student_Request $request)
    {
		
        $data = $request->all();		
		
		if($file = $request->hasFile('st_image')) {
            
				$file = $request->file('st_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/student/' ;
				
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
            'role' => 'student',
			'address' => $data['address'],
			'city' => $data['city'],
			'country_id' => $data['country_id'],
			'state_id' => $data['state_id'],
			'dob' => date("Y-m-d", strtotime($data['dob']) ),
			'image' => (isset($profile_image)) ? $profile_image : '',
        ])->id;
		
		if($user_id){
			$user_id	= 	Auth::user()->id;
			$school		= 	School::where('schl_user_id',$user_id)->first();
			$school_id 	= 	(isset($school)) ? $school->id : 0;
		
			$stud_id = Student::create([
							'st_user_id' => $user_id,
							'st_reg_no' => $data['st_reg_no'],
							'st_school_id' => $school_id,
							'st_parent_id' => $data['st_parent_id'],
							'st_class' => $data['st_class'],							
							'st_contact_no' => $data['st_contact_no'],
							'st_hcyknow' => $data['st_hcyknow'],
							'st_description' => $data['st_description'],							
							])->id;
			if(empty($stud_id)){
				DB::rollback();
			}
			DB::commit();
			
			return redirect()->route('tenant.students.index')->with('success','Student added successfully');
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

        $student = DB::table('users')
				->join('students', 'students.user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.email','users.status','students.*')
				->where('users.id', $id)
				->first();
        return view('tenant.students.show',compact('student'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
		$student = DB::table('users')
				->join('students', 'students.st_user_id', '=', 'users.id')
				->select('users.first_name','users.last_name','users.status','users.country_id','users.state_id','users.image','users.dob','users.address','users.city','students.*')
				->where('users.id', $id)
				->first();
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $student->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
		$cities 	= City::where('state_id', $student->state_id)->where('status',1)->orderBy('city_name')->pluck('city_name', 'id');
		$schools 	= ['0'=>'Please select'] + School::orderBy('schl_name')->pluck('schl_name', 'id')->all();
		$parents = DB::table('users')
				->join('parents', 'parents.pa_user_id', '=', 'users.id')
				->select(DB::raw('CONCAT(first_name, " ", last_name) AS parent_name'),'parents.id')
				->where('users.role', 'parent')
				->where('users.status', '!=' , 2)
				->orderBy('users.first_name')
				->where('parents.pa_school_id', $student->st_school_id)
				->pluck(DB::raw('CONCAT(first_name, " ", last_name) AS parent_name'),'parents.id');   
				
		$parents = ['0'=>'select'] + User::where('status', '!=' , 2)->where('id', $student->st_parent_id)->orderBy('first_name')->pluck('first_name', 'id')->all();
		return view('tenant.students.addedit',compact('student','countries','states','cities','schools','parents'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Student_Request $request, $id)
    {
		
		$profile_image = '';
		$data = $request->all();
		
		if($file = $request->hasFile('st_image')) {
		
			$file = $request->file('st_image') ;
			
			$fileName = $file->getClientOriginalName() ;
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
			$student['image']=$profile_image;
		
		DB::beginTransaction();
		
		User::find($data['st_user_id'])->update($user);
		
		$student = ['st_user_id' => $data['st_user_id'],
					'st_reg_no' => $data['st_reg_no'],
					'st_parent_id' => $data['st_parent_id'],
					'st_class' => $data['st_class'],
					'st_contact_no' => $data['st_contact_no'],
					'st_hcyknow' => $data['st_hcyknow'],
					'st_description' => $data['st_description'],
					];

		
		$stud_id = Student::find($id)->update($student);
		
		if(empty($stud_id)){
				DB::rollback();
		}
		DB::commit();
		
		return redirect()->route('tenant.students.index')->with('success','Student updated successfully');

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
        return redirect()->route('tenant.students.index')
                        ->with('success','Student deleted successfully');
    }
	
	/* Get parents by school id through ajax */
	public function getparents(Request $request)
	{
		//$state 		= State::find($request->input('s_id'));
		
		$parents = DB::table('users')
				->join('parents', 'parents.pa_user_id', '=', 'users.id')
				->select(DB::raw('CONCAT(first_name, " ", last_name) AS parent_name'),'users.id')
				->where('users.role', 'parent')
				->where('users.status', '!=' , 2)
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