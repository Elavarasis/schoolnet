<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\School;
use App\Fee;
use App\Fee_student;
use App\Fee_paid;
use App\Option;
use DB;

class Fees extends Controller
{

    public function index(Request $request)
    {
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		
		$all_fee 	= 	Fee::where('fee_status','<>',2)->where('fee_school_id',$school->id)->orderBy('created_at', 'desc')->get();
		return view('tenant.fee.index',compact('all_fee'));
    }


    public function create()
    {	
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		
		return view('tenant.fee.addedit',compact('school'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'fee_name' => 'required',
            'fee_amount' => 'required',
        ]);
		
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();	
		
		if($request->fee_school_id == $school->id){
			Fee::create($request->all());

			return redirect()->route('tenant.fee.index')
                        ->with('success','Fee added successfully');
		} else {
			return redirect()->route('tenant.fee.index')
                        ->with('success','Something went wrong, try again later');
		}

    }


    public function show($id)
    {
        $city = City::find($id);
        return view('tenant.fee.show',compact('city'));
    }


    public function edit($id)
    {
        $user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();		
		$fee 		= 	Fee::where('id',$id)->where('fee_school_id',$school->id)->first();
        return view('tenant.fee.addedit',compact('fee','school'));
    }
	

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'fee_name' => 'required',
            'fee_amount' => 'required',
        ]);
		
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		
        if($request->fee_school_id == $school->id){
			Fee::find($id)->update($request->all());

			return redirect()->route('tenant.fee.index')
                        ->with('success','Fee updated successfully');
		} else {
			return redirect()->route('tenant.fee.index')
                        ->with('success','Something went wrong, try again later');
		}

    }
	

    public function destroy($id)
    {
        Fee::find($id)->delete();
        return redirect()->route('tenant.fee.index')
                        ->with('success','Fee deleted successfully');
    }
	
	
	public function assign_fee()
    {
        $user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;
		
		$input 		= 	Input::all();
		$data['register_number']= 	(isset($input['register_number'])) ? $input['register_number'] : '';
		$data['class']			= 	(isset($input['class'])) ? $input['class'] : '';
		
		//Filter Dropdown Data
		$query		= 	DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.id','users.first_name','users.last_name','students.st_reg_no','students.st_class')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->orderBy('users.first_name', 'asc');
						
						if($data['register_number'])
							$query->where('students.st_reg_no',$data['register_number']);
						if($data['class'])
							$query->where('students.st_class',$data['class']);
		
		if($input){
			$students 	= 	$query->get();
		} else {
			$students 	= 	array();
		}
		
		$all_fee 	= 	Fee::where('fee_status','<>',2)->where('fee_school_id',$school_id)->orderBy('created_at', 'desc')->pluck('fee_name','id')->all();
		
		$divisions	= 	Option::where('opt_key', $school_id)->where('opt_type', 'division')->pluck('opt_text','opt_text')->all();
		return view('tenant.fee.assign_fee',compact('students','divisions','data','all_fee'));
    }
	
	
	public function add_batch(Request $request)
    {
		$data 	= 	$request->all();
		$fee_id	=	$data['f'];
		$reg_no	=	$data['rno'];
		$class	=	$data['c'];
		
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();		
		$fee 		= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		
		if($fee){
			$query		= 	DB::table('users')
							->join('students', 'students.st_user_id', '=', 'users.id')
							->select('users.id')
							->where('students.st_school_id', $school->id)
							->where('users.status', 1);
							
							if($reg_no)
								$query->where('students.st_reg_no',$reg_no);
							if($class)
								$query->where('students.st_class',$class);
		
			$students 	= 	$query->get();
			$insert		=	array();
			if(count($students) > 0){
				foreach ($students as $key => $stud) {
					
					$exists		= 	Fee_student::where('fs_fee_id',$fee_id)->where('fs_user_id',$stud->id)->first();
					
					if(!$exists){
						$insert[] 	= 	[
									'fs_fee_id' => $fee_id,
									'fs_user_id' => $stud->id,
									'fs_status' => 0,
									];
					} else {
						DB::table('fee_students')->where('fs_fee_id', $fee_id)->where('fs_user_id', $stud->id)->update(['fs_status' => 0]);
					}
				}
			}
			

			if(!empty($insert)){
				DB::table('fee_students')->insert($insert);
				$return = array(
							'status' => 'success',
							'message' => 'Fee successfully Assigned'
							);
			} else {	
				$return = array(
							'status' => 'success',
							'message' => 'Updated'
							);
			}
		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Something went wrong, please try again later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function remove_batch(Request $request)
    {
		$data 	= 	$request->all();
		$fee_id	=	$data['f'];
		$reg_no	=	$data['rno'];
		$class	=	$data['c'];
		
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();		
		$fee 		= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		$remove_ids	=	array();
		
		if($fee){
			$query		= 	DB::table('users')
							->join('students', 'students.st_user_id', '=', 'users.id')
							->select('users.id')
							->where('students.st_school_id', $school->id)
							->where('users.status', 1);
							
							if($reg_no)
								$query->where('students.st_reg_no',$reg_no);
							if($class)
								$query->where('students.st_class',$class);
		
			$students 	= 	$query->get();
			
			if(count($students) > 0){
				foreach ($students as $key => $stud) {
					DB::table('fee_students')->where('fs_fee_id', $fee_id)->where('fs_user_id', $stud->id)->update(['fs_status' => 2]);
				}
			}
			

			$return = array(
							'status' => 'success',
							'message' => 'Fee successfully removed for selected students'
							);
		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Something went wrong, please try again later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function add_single(Request $request)
    {
		$data 		= 	$request->all();
		$user_id	=	$data['u'];
		$fee_id		=	$data['f'];
		
		$logged_user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$logged_user_id)->first();		
		$fee 		= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		
		if($fee){
			
			$exists		= 	Fee_student::where('fs_fee_id',$fee_id)->where('fs_user_id',$user_id)->first();
			
			if(!$exists){
				$insert[] 	= 	[
								'fs_fee_id' => $fee_id,
								'fs_user_id' => $user_id,
								'fs_status' => 0,
								];
				DB::table('fee_students')->insert($insert);	
			} else {
				DB::table('fee_students')->where('fs_fee_id', $fee_id)->where('fs_user_id', $user_id)->update(['fs_status' => 0]);
			}
			
			$return = array(
							'status' => 'success',
							'message' => 'Assigned'
							);								

		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Try Again Later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function remove_single(Request $request)
    {
		$data 		= 	$request->all();
		$user_id	=	$data['u'];
		$fee_id		=	$data['f'];
		
		$logged_user_id	= 	Auth::user()->id;
		$school			= 	School::where('schl_user_id',$logged_user_id)->first();		
		$fee 			= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		
		if($fee){
			
			$exists		= 	Fee_student::where('fs_fee_id',$fee_id)->where('fs_user_id',$user_id)->first();
			
			DB::table('fee_students')->where('fs_fee_id', $fee_id)->where('fs_user_id', $user_id)->delete();
			
			$return = array(
							'status' => 'success',
							'message' => 'Removed'
							);								

		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Try Again Later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function pay_fee()
    {
        $user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();
		$school_id 	= 	(isset($school)) ? $school->id : 0;
		
		$input 		= 	Input::all();
		$data['register_number']= 	(isset($input['register_number'])) ? $input['register_number'] : '';
		$data['class']			= 	(isset($input['class'])) ? $input['class'] : '';
		
		//Filter Dropdown Data
		$query		= 	DB::table('users')
						->join('students', 'students.st_user_id', '=', 'users.id')
						->select('users.id','users.first_name','users.last_name','students.st_reg_no','students.st_class')
						->where('students.st_school_id', $school_id)
						->where('users.status', 1)
						->orderBy('users.first_name', 'asc');
						
						if($data['register_number'])
							$query->where('students.st_reg_no',$data['register_number']);
						if($data['class'])
							$query->where('students.st_class',$data['class']);
		
		if($input){
			$students 	= 	$query->get();
		} else {
			$students 	= 	array();
		}
		
		$all_fee 	= 	Fee::where('fee_status','<>',2)->where('fee_school_id',$school_id)->orderBy('created_at', 'desc')->pluck('fee_name','id')->all();
		
		$divisions	= 	Option::where('opt_key', $school_id)->where('opt_type', 'division')->pluck('opt_text','opt_text')->all();
		return view('tenant.fee.pay_fee',compact('students','divisions','data','all_fee'));
    }
	
	
	public function pay_batch(Request $request)
    {
		$data 	= 	$request->all();
		$fee_id	=	$data['f'];
		$reg_no	=	$data['rno'];
		$class	=	$data['c'];
		
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();		
		$fee 		= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		
		if($fee){
			$query		= 	DB::table('users')
							->join('students', 'students.st_user_id', '=', 'users.id')
							->select('users.id')
							->where('students.st_school_id', $school->id)
							->where('users.status', 1);
							
							if($reg_no)
								$query->where('students.st_reg_no',$reg_no);
							if($class)
								$query->where('students.st_class',$class);
		
			$students 	= 	$query->get();
			$insert		=	array();
			if(count($students) > 0){
				foreach ($students as $key => $stud) {
					
					$total_fee	=	$fee->fee_amount;
					$paid_fee 	= 	DB::table('fee_paid')->where('fp_user_id',$stud->id)->where('fp_fee_id',$fee_id)->sum('fp_amount');
					
					$balance_fee=	$total_fee - $paid_fee;
					
					if($balance_fee > 0){
						$insert[] 	= 	[
										'fp_user_id' => $stud->id,
										'fp_fee_id' => $fee_id,
										'fp_amount' => $balance_fee,
										'fp_description' => '',
										'fp_status' => 0,
										];
					} else {
						DB::table('fee_paid')->where('fp_user_id',$stud->id)->where('fp_fee_id',$fee_id)->update(['fp_status' => 0]);
					}
				}
			}
			

			if(!empty($insert)){
				DB::table('fee_paid')->insert($insert);
				$return = array(
							'status' => 'success',
							'message' => 'Fee successfully Paid'
							);
			} else {	
				$return = array(
							'status' => 'success',
							'message' => 'Updated'
							);
			}
		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Something went wrong, please try again later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function unpay_batch(Request $request)
    {
		$data 	= 	$request->all();
		$fee_id	=	$data['f'];
		$reg_no	=	$data['rno'];
		$class	=	$data['c'];
		
		$user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$user_id)->first();		
		$fee 		= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		$remove_ids	=	array();
		
		if($fee){
			$query		= 	DB::table('users')
							->join('students', 'students.st_user_id', '=', 'users.id')
							->select('users.id')
							->where('students.st_school_id', $school->id)
							->where('users.status', 1);
							
							if($reg_no)
								$query->where('students.st_reg_no',$reg_no);
							if($class)
								$query->where('students.st_class',$class);
		
			$students 	= 	$query->get();
			
			if(count($students) > 0){
				foreach ($students as $key => $stud) {
					DB::table('fee_paid')->where('fp_fee_id', $fee_id)->where('fp_user_id', $stud->id)->update(['fp_status' => 2]);
				}
			}
			

			$return = array(
							'status' => 'success',
							'message' => 'Fee successfully removed for selected students'
							);
		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Something went wrong, please try again later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function pay_single(Request $request)
    {
		$data 		= 	$request->all();
		$user_id	=	$data['u'];
		$fee_id		=	$data['f'];
		$fee_amount	=	$data['a'];
		
		$logged_user_id	= 	Auth::user()->id;
		$school		= 	School::where('schl_user_id',$logged_user_id)->first();		
		$fee 		= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		
		if($fee){
			
			$total_fee	=	$fee->fee_amount;
			$paid_fee 	= 	DB::table('fee_paid')->where('fp_user_id',$user_id)->where('fp_fee_id',$fee_id)->sum('fp_amount');
					
			$balance_fee=	$total_fee - $paid_fee;
			
			if($fee_amount > $balance_fee){
				$return = array(
							'status' => 'error',
							'message' => 'Failed, Your Fee Blance is '.$balance_fee.'Rs'
							);
				echo json_encode($return);
				exit;
			}
					
			if($balance_fee > 0){
				$insert[] 	= 	[
								'fp_user_id' => $user_id,
								'fp_fee_id' => $fee_id,
								'fp_amount' => ($fee_amount > 0) ? $fee_amount : $balance_fee,
								'fp_description' => '',
								'fp_status' => 0,
								];
				DB::table('fee_paid')->insert($insert);	
			} else {
				DB::table('fee_paid')->where('fp_user_id',$user_id)->where('fp_fee_id',$fee_id)->update(['fp_status' => 0]);
			}	
			
			$return = array(
							'status' => 'success',
							'message' => 'Paid'
							);								

		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Try Again Later'
							);
		}
		
		echo json_encode($return);
    }
	
	
	public function unpay_single(Request $request)
    {
		$data 		= 	$request->all();
		$user_id	=	$data['u'];
		$fee_id		=	$data['f'];
		
		$logged_user_id	= 	Auth::user()->id;
		$school			= 	School::where('schl_user_id',$logged_user_id)->first();		
		$fee 			= 	Fee::where('id',$fee_id)->where('fee_school_id',$school->id)->first();
		
		if($fee){
			
			$exists		= 	Fee_student::where('fs_fee_id',$fee_id)->where('fs_user_id',$user_id)->first();
			
			DB::table('fee_students')->where('fs_fee_id', $fee_id)->where('fs_user_id', $user_id)->delete();
			
			$return = array(
							'status' => 'success',
							'message' => 'Removed'
							);								

		} else {
			$return = array(
							'status' => 'error',
							'message' => 'Try Again Later'
							);
		}
		
		echo json_encode($return);
    }
	
}