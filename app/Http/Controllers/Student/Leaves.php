<?php
namespace App\Http\Controllers\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Leave_Request;
use Auth;
use App\User;
use App\Leave;
use Redirect;
use DB;

class Leaves extends Controller
{

    public function index(Request $request)
    {
		$user_id= Auth::user()->id;
		//$leaves = Leave::where('lv_user_id',$user_id)->orWhere('lv_applicant',$user_id)->where('lv_user_del',0)->orderBy('id', 'asc')->get();
		$leaves = Leave::where('lv_user_id',$user_id)->where('lv_user_del',0)->orderBy('id', 'asc')->get();
		return view('student.leaves.index',compact('leaves'));
    }

    public function create()
    {
		return view('student.leaves.addedit');
    }

    public function store(Leave_Request $request)
    {
		
        $data = $request->all();
		
		$user_id	=	Auth::user()->id;
		
		$var 	= explode('/',$data['lv_start_date']);
		$s_date = $var[2].'-'.$var[0].'-'.$var[1];
		
		$var2 	= explode('/',$data['lv_end_date']);
		$e_date = $var2[2].'-'.$var2[0].'-'.$var2[1];
		
		$leave_id = Leave::create([
            'lv_user_id' => $user_id,
            'lv_applicant' => $user_id,
            'lv_totaldays' => $data['lv_totaldays'],
            'lv_start_date' => $s_date,
			'lv_start_time' => $data['lv_start_time'],
            'lv_end_date' => $e_date,
            'lv_end_time' => $data['lv_end_time'],
			'lv_reason' => $data['lv_reason'],
			'lv_status' => 0,
        ])->id;
		
		if($leave_id > 0){
			return redirect()->route('stud.leaves.index')->with('success','Request has been sent.');			
		} else {
			return redirect()->route('stud.leaves.index')->with('error','Something went wrong, please try again later');	
		}
		
    }

    public function show($id)
    {
        $leave = Leave::find($id);
        return view('student.leaves.show',compact('leave'));

    }

    public function edit($id)
    {
		$user_id	=	Auth::user()->id;
		$leave 		= 	Leave::where('id',$id)->where('lv_user_id',$user_id)->where('lv_user_del',0)->where('lv_status',0)->first();
		if(empty($leave)){
			return redirect()->route('stud.leaves.index')->with('error', 'You can not edit this Leave Request anymore');
		}	
        return view('student.leaves.addedit',compact('leave'));
    }
	

    public function update(Leave_Request $request, $id)
    {	
		$data = $request->all();
		
		$var 	= explode('/',$data['lv_start_date']);
		$s_date = $var[2].'-'.$var[0].'-'.$var[1];
		
		$var2 	= explode('/',$data['lv_end_date']);
		$e_date = $var2[2].'-'.$var2[0].'-'.$var2[1];
		
		$leave = [
				'lv_totaldays' => $data['lv_totaldays'],
				'lv_start_date' => $s_date,
				'lv_start_time' => $data['lv_start_time'],
				'lv_end_date' => $e_date,
				'lv_end_time' => $data['lv_end_time'],
				'lv_reason' => $data['lv_reason'],
				'lv_status' => 0,
				];
		
		Leave::find($id)->update($leave);
		
		return redirect()->route('stud.leaves.index')->with('success','Leave Request updated successfully');
    }


    public function destroy($id)
    {	
        $user_id	=	Auth::user()->id;
		$delete		=	Leave::where('id',$id)->where('lv_user_id',$user_id)->update(['lv_user_del'=>1]);
        
		if($delete){
			return redirect()->route('stud.leaves.index')->with('success','Leave Request deleted successfully');			
		} else {
			return redirect()->route('stud.leaves.index')->with('error','Something went wrong, please try again later');	
		}
    }
	
}