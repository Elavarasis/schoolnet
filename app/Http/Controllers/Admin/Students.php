<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\School;
use App\City;
use App\Country;
use App\State;
use App\User;
use DB;
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
		$students = User::where('role', 'student')->where('status', '!=' , 2)->orderBy('first_name', 'asc')->get();
		return view('admin.students.index',compact('students'));
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
		return view('admin.students.addedit',compact('countries','states','schools'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
		$this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
			'st_school_id' => 'required|numeric',
			'st_country_id' => 'required|numeric',
			'st_state_id' => 'required|numeric',
			'st_dob' => 'required|date_format:d/m/Y',
			'st_contact_no' => 'numeric',
			'st_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
        $data = $request->all(); 
		$user_id = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'role' => 'student',
            'password' => bcrypt($data['password']),
        ])->id;
		
		if($user_id){
			
			if($file = $request->hasFile('st_image')) {
            
				$file = $request->file('st_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/student/' ;
				$file->move($destinationPath,$fileName);
				$profile_image = $fileName ;
			}
		
			$user_id = Student::create([
							'st_user_id' => $user_id,
							'st_school_id' => $data['st_school_id'],
							'st_class' => $data['st_class'],
							'st_address' => $data['st_address'],
							'st_city' => $data['st_city'],
							'st_country_id' => $data['st_country_id'],
							'st_state_id' => $data['st_state_id'],
							'st_dob' => date("Y-m-d", strtotime($data['st_dob']) ),
							'st_contact_no' => $data['st_contact_no'],
							'st_hcyknow' => $data['st_hcyknow'],
							'st_description' => $data['st_description'],
							'st_image' => (isset($profile_image)) ? $profile_image : '',
							])->id;
				
			return redirect()->route('admin.students.index')->with('success','Student added successfully');
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
        return view('admin.students.show',compact('student'));

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
				->select('users.first_name','users.last_name','users.status','students.*')
				->where('users.id', $id)
				->first();
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $student->st_country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
		$schools 	= School::orderBy('schl_name')->pluck('schl_name', 'id');
        return view('admin.students.addedit',compact('student','countries','states','schools'));
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
			'st_school_id' => 'required|numeric',
			'st_country_id' => 'required|numeric',
			'st_state_id' => 'required|numeric',
			'st_dob' => 'required|date_format:d/m/Y',
			'st_contact_no' => 'numeric',
			'st_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
		$profile_image = '';
		$data = $request->all();
		$user = ['first_name' => $data['first_name'],
		'last_name' => $data['last_name'],
		'status' => $data['status']];
		User::find($data['st_user_id'])->update($user);
		
		if($file = $request->hasFile('st_image')) {
            
				$file = $request->file('st_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/student/' ;
				$file->move($destinationPath,$fileName);
				$profile_image = $fileName ;
			}
		
		$student = ['st_user_id' => $data['st_user_id'],
					'st_school_id' => $data['st_school_id'],
					'st_class' => $data['st_class'],
					'st_address' => $data['st_address'],
					'st_city' => $data['st_city'],
					'st_country_id' => $data['st_country_id'],
					'st_state_id' => $data['st_state_id'],
					'st_dob' => date("Y-m-d", strtotime($data['st_dob']) ),
					'st_contact_no' => $data['st_contact_no'],
					'st_hcyknow' => $data['st_hcyknow'],
					'st_description' => $data['st_description'],
					];
		if(!empty($profile_image))
			$student['st_image']=$profile_image;
		
		Student::find($id)->update($student);

		return redirect()->route('admin.students.index')->with('success','Student updated successfully');

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
        return redirect()->route('admin.students.index')
                        ->with('success','Student deleted successfully');
    }
	
}