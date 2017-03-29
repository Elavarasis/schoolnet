<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Leave;
use App\School;
use Redirect;
use DB;

class Leaves extends Controller
{

    public function index(Request $request)
    {
		$user_id= Auth::user()->id;
		
		$school	= School::where('schl_user_id',$user_id)->first();
		
		if($school){
			$leaves = DB::table('leaves')
					->join('users as u', 'leaves.lv_user_id', '=', 'u.id')
					->join('users as u1', 'leaves.lv_applicant', '=', 'u1.id')
					->join('students', 'leaves.lv_user_id', '=', 'students.st_user_id')
					->select('u.first_name','u.last_name','leaves.*')
					->where('students.st_school_id',$school->id)
					->where('leaves.lv_tenant_del',0)
					->get();
			return view('tenant.leaves.index',compact('leaves'));
		}	
		
    }

    public function create()
    {
		return view('tenant.leaves.addedit');
    }

    public function store(Leave_Request $request)
    {
		//
    }

    public function show($id)
    {
        $user_id= Auth::user()->id;
		$school	= School::where('schl_user_id',$user_id)->first();
		$leave 	= $leaves = DB::table('leaves')
					->join('users as u', 'leaves.lv_user_id', '=', 'u.id')
					->join('users as u1', 'leaves.lv_applicant', '=', 'u1.id')
					->join('students', 'leaves.lv_user_id', '=', 'students.st_user_id')
					->select('u.first_name','u.last_name','u.email','u1.first_name as apl_first_name','u1.last_name as apl_last_name','u1.email as apl_email','leaves.*')
					->where('students.st_school_id',$school->id)
					->where('leaves.lv_tenant_del',0)
					->where('leaves.id',$id)
					->first();
        return view('tenant.leaves.show',compact('leave'));

    }

    public function edit($id)
    {
		//
    }
	

    public function update(Leave_Request $request, $id)
    {	
		//
    }


    public function destroy($id)
    {	
        $user_id	=	Auth::user()->id;
		$delete		=	Leave::where('id',$id)->update(['lv_tenant_del'=>1]);
        
		if($delete){
			return redirect()->route('tenant.leaves.index')->with('success','Leave Request deleted successfully');			
		} else {
			return redirect()->route('tenant.leaves.index')->with('error','Something went wrong, please try again later');	
		}
    }
	
	public function update_status(Request $request){
		
		$data = $request->all();
		
		$leave = [
				'lv_status' => $data['lv_status'],
				'lv_remarks' => $data['lv_remarks']
				];
		
		Leave::find($data['leave_id'])->update($leave);
		
		return redirect()->route('tenant.leaves.index')->with('success','Updated successfully');
	}
	
}