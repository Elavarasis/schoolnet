<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Attendance;
use App\User;
use App\Student;
use App\School;
use App\Option;
use Excel;
use DB;
use Redirect;

class Attendances extends Controller
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
		
		$attendances= $data = array();
		
		//Filter Dropdown Data
		$students	= 	DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.id','users.first_name','users.last_name')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->get();
						
		$divisions	= 	Option::where('opt_key', $school_id)->where('opt_type', 'division')->pluck('opt_text','opt_text')->all();
		
		$markers	= 	Option::where('opt_key', $school_id)->where('opt_type', 'attentance_marker')->pluck('opt_text','opt_text')->all();
		return view('tenant.attendances.index',compact('students','divisions','markers','attendances','data'));

    }
	
	
	public function search(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;	
		
		$data 		= 	$request->all();
		$data['start_date']		=	(isset($data['start_date'])) ? $data['start_date'] : '';
		$data['end_date']		=	(isset($data['end_date'])) ? $data['end_date'] : '';
		$data['register_number']=	(isset($data['register_number'])) ? $data['register_number'] : '';
		$data['class']			=	(isset($data['class'])) ? $data['class'] : '';
		$data['marker']			=	(isset($data['marker'])) ? $data['marker'] : '';
		
		$date		=	explode('/',$data['start_date']);
		$date2		=	explode('/',$data['end_date']);
		$start_date	=	'';
		$end_date	=	'';
		
		if(count($date) == 3)
			$start_date = $date[2].'-'.$date[0].'-'.$date[1];
		if(count($date2) == 3)
			$end_date 	= $date2[2].'-'.$date2[0].'-'.$date2[1];
		
		$query		=	DB::table('users')
						->join('attentances', 'attentances.att_user_id', '=', 'users.id')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.first_name','users.last_name','attentances.att_user_id','students.st_reg_no')
						->where('students.st_school_id', $school_id)
						->orderBy('users.first_name', 'asc');
						
						if($data['register_number'])
							$query->where('students.st_reg_no',$data['register_number']);
						if($data['start_date'])
							$query->where('attentances.att_date','>=',$start_date);
						if($data['end_date'])
							$query->where('attentances.att_date','<=',$end_date);
						if($data['class'])
							$query->where('students.st_class',$data['class']);
						if($data['marker'])
							$query->where('attentances.att_attentance',$data['marker']);
						
						
						
		$attendances = $query->get();
		
		//Filter Dropdown Data
		$students	= 	DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.id','users.first_name','users.last_name')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->get();
						
		$divisions	= 	Option::where('opt_key', $school_id)->where('opt_type', 'division')->pluck('opt_text','opt_text')->all();
		
		$markers	= 	Option::where('opt_key', $school_id)->where('opt_type', 'attentance_marker')->pluck('opt_text','opt_text')->all();

		return view('tenant.attendances.index',compact('students','divisions','markers','attendances','data'));
    }
	
	
	public function export(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;	
		
		$data 		= 	$request->all();
		$data['start_date']		=	(isset($data['start_date'])) ? $data['start_date'] : '';
		$data['end_date']		=	(isset($data['end_date'])) ? $data['end_date'] : '';
		$data['register_number']=	(isset($data['register_number'])) ? $data['register_number'] : '';
		$data['class']			=	(isset($data['class'])) ? $data['class'] : '';
		$data['marker']			=	(isset($data['marker'])) ? $data['marker'] : '';
		
		$date		=	explode('/',$data['start_date']);
		$date2		=	explode('/',$data['end_date']);
		$start_date	=	'';
		$end_date	=	'';
		
		if(count($date) == 3)
			$start_date = $date[2].'-'.$date[0].'-'.$date[1];
		if(count($date2) == 3)
			$end_date 	= $date2[2].'-'.$date2[0].'-'.$date2[1];
		
		$query		=	DB::table('users')
						->join('attentances', 'attentances.att_user_id', '=', 'users.id')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.first_name','users.last_name','attentances.att_user_id','students.st_reg_no')
						->where('students.st_school_id', $school_id)
						->orderBy('users.first_name', 'asc');
						
						if($data['register_number'])
							$query->where('students.st_reg_no',$data['register_number']);
						if($data['start_date'])
							$query->where('attentances.att_date','>=',$start_date);
						if($data['end_date'])
							$query->where('attentances.att_date','<=',$end_date);
						if($data['class'])
							$query->where('students.st_class',$data['class']);
						if($data['marker'])
							$query->where('attentances.att_attentance',$data['marker']);
						
						
						
		$attendances = $query->get();
		
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=attendance.xls");

		return view('export.attendances',compact('attendances','data'));
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

	 //$countries 	= Country::where('status', 1)->orderBy('country')->pluck('country', 'id');
	 //$countries	= Country::lists('country', 'id'); //version below 5.2 use 'lists' instead of 'pluck'
     */

    public function create()
    {
        //
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
		//
    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)
    {
		//
    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
        //
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
		//
    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {
        //
    }
	
	
	/* import */
	public function import()
	{
		return view('tenant.attendances.import');
	}
	
	public function import_now(Request $request)
	{
		$req = $request->all();
		
		$this->validate($request, [
            'month' => 'required',
            'year' => 'required',
        ]);
		
		$user_id= Auth::user()->id;
		$school	= School::where('schl_user_id',$user_id)->first();
		$school_id = (isset($school)) ? $school->id : 0;
		
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {

			})->get();
			
			$insert	=	array();
			if(!empty($data) && $data->count()){

				foreach ($data as $key => $value) {
					foreach ($value as $row)
					{
						for($i=1; $i<=31; $i++){
							
							$date		= $req['year'].'-'.$req['month'].'-'.$i;
							//check tenant has permission to add attendance for this student
							$student	= Student::where('st_user_id',$row->userid)->where('st_school_id',$school_id)->first();
							
							//check already added
							$attentance	= Attendance::where('att_date',$date)->where('att_user_id',$row->userid)->first();
							
							//if not added already add data
							if(!$attentance && $student && !empty($row[$i])){
								$insert[] = [
									'att_user_id' => $row->userid,
									'att_date' => $date,
									'att_attentance' => $row[$i],
									];
							}
							
						}						
					}
				}

				if(!empty($insert)){
					DB::table('attentances')->insert($insert);
					return redirect('tenant/attendances/import')->with('success','Imported successfully');
				} else {	
					return redirect('tenant/attendances/import')->with('error','Something went wrong, this data may be already added');
				}
			}
		}

		//return back();
	}

	
}