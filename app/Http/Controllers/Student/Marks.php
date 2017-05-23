<?php
namespace App\Http\Controllers\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Mark;
use App\User;
use App\Student;
use App\School;
use App\Option;
use Excel;
use DB;
use Redirect;

class Marks extends Controller
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
		
		$marks = $data = array();
		
		//Filter Dropdown Data
		$students	= 	DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.id','users.first_name','users.last_name','students.st_reg_no')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->get();
						
		$exam_names	= 	DB::table('marks')
						->join('users', 'marks.mrk_user_id', '=', 'users.id')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('marks.mrk_exam_name')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->groupBy('marks.mrk_exam_name')
						->get();
						
		$divisions	= 	Option::where('opt_key', $school_id)->where('opt_type', 'division')->pluck('opt_text','opt_text')->all();
		
		return view('student.marks.index',compact('students','divisions','marks','data','exam_names'));

    }
	
	
	public function search(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;	
		
		$data 		= 	$request->all();
		$data['month']			= 	(isset($data['month'])) ? $data['month'] : '';
		$data['year']			= 	(isset($data['year'])) ? $data['year'] : date('Y');
		$data['register_number']=	(isset($data['register_number'])) ? $data['register_number'] : '';
		$data['class']			=	(isset($data['class'])) ? $data['class'] : '';
		$data['exam_name']		=	(isset($data['exam_name'])) ? $data['exam_name'] : '';
		
		$start_date = $end_date = '';
		
		if(!empty($data['month'])){
			$start_date				=	$data['year'].'-'.$data['month'].'-1';
			$end_date				=	$data['year'].'-'.$data['month'].'-31';			
		}
		
		$query		=	DB::table('users')
						->join('marks', 'marks.mrk_user_id', '=', 'users.id')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.first_name','users.last_name','students.st_reg_no','students.st_class','marks.*')
						->where('students.st_school_id', $school_id)
						->orderBy('users.first_name', 'asc');
						
						if(!empty($start_date) && !empty($end_date)){
							$query->where('marks.mrk_date','>=',$start_date);
							$query->where('marks.mrk_date','<=',$end_date);
						}
						
						if($data['register_number'])
							$query->where('students.st_reg_no',$data['register_number']);
						if($data['class'])
							$query->where('students.st_class',$data['class']);
						if($data['exam_name'])
							$query->where('marks.mrk_exam_name',$data['exam_name']);
							
						
		$marks = $query->get();
		
		//Filter Dropdown Data
		$students	= 	DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.id','users.first_name','users.last_name','students.st_reg_no')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->get();
						
		$exam_names	= 	DB::table('marks')
						->join('users', 'marks.mrk_user_id', '=', 'users.id')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('marks.mrk_exam_name')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->groupBy('marks.mrk_exam_name')
						->get();
						
		$divisions	= 	Option::where('opt_key', $school_id)->where('opt_type', 'division')->pluck('opt_text','opt_text')->all();
		
		return view('student.marks.index',compact('students','divisions','marks','data','exam_names'));
    }
	
	
	public function export(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;	
		
		$data 		= 	$request->all();
		$data['month']			= 	(isset($data['month'])) ? $data['month'] : date('m');
		$data['year']			= 	(isset($data['year'])) ? $data['year'] : date('Y');
		$data['register_number']=	(isset($data['register_number'])) ? $data['register_number'] : '';
		$data['class']			=	(isset($data['class'])) ? $data['class'] : '';
		$data['exam_name']		=	(isset($data['exam_name'])) ? $data['exam_name'] : '';
		
		$start_date = $end_date = '';
		
		if(!empty($data['month'])){
			$start_date				=	$data['year'].'-'.$data['month'].'-1';
			$end_date				=	$data['year'].'-'.$data['month'].'-31';			
		}
		
		$query		=	DB::table('users')
						->join('marks', 'marks.mrk_user_id', '=', 'users.id')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.first_name','users.last_name','students.st_reg_no','students.st_class','marks.*')
						->where('students.st_school_id', $school_id)
						->orderBy('users.first_name', 'asc');
						
						if(!empty($start_date) && !empty($end_date)){
							$query->where('marks.mrk_date','>=',$start_date);
							$query->where('marks.mrk_date','<=',$end_date);
						}
						
						if($data['register_number'])
							$query->where('students.st_reg_no',$data['register_number']);
						if($data['class'])
							$query->where('students.st_class',$data['class']);
						if($data['exam_name'])
							$query->where('marks.mrk_exam_name',$data['exam_name']);
							
						
		$marks 		= $query->get();
		
		$file_name 		= 'Marks-'.time();
		
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$file_name.xls");

		return view('student.marks.export',compact('marks'));
    }	
	
	/* import */
	public function import()
	{
		return view('student.marks.import');
	}
	
	public function import_now(Request $request)
	{
		$req = $request->all();
		
		$this->validate($request, [
			'exam_name' => 'required',
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
					
							$date		= $req['year'].'-'.$req['month'].'-01';
							//check student has permission to add marks for this student
							$student	= Student::where('st_reg_no',$row->regno)->where('st_school_id',$school_id)->first();
							
							//check already added
							$mark	= Mark::where('mrk_date',$date)
											->where('mrk_reg_no',$row->regno)
											->where('mrk_exam_name',$req['exam_name'])
											->where('mrk_subject',$row->subject)
											->where('mrk_date',$date)
											->first();
							
							//if not added already add data
							if(!$mark && $student){
								$insert[] = [
									'mrk_user_id' => $student->st_user_id,
									'mrk_reg_no' => $row->regno,
									'mrk_exam_name' => $req['exam_name'],
									'mrk_subject' => $row->subject,
									'mrk_total_mark' => $row->total_mark,
									'mrk_pass_mark' => $row->pass_mark,
									'mrk_mark_got' => $row->mark_got,
									'mrk_date' => $date
									];
							}					
					}
				}

				if(!empty($insert)){
					DB::table('marks')->insert($insert);
					return redirect('stud/marks/import')->with('success','Imported successfully');
				} else {	
					return redirect('stud/marks/import')->with('error','Something went wrong, this data may be already added');
				}
			}
		}

		//return back();
	}

	
}