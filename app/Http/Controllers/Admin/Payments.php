<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Option;

class Payments extends Controller
{

    public function index(Request $request)
    {
		$payment_methods = Option::where('opt_status','<>',2)->where('opt_type', 'payment')->orderBy('opt_key', 'asc')->get();
		return view('admin.payments.index',compact('payment_methods'));
    }


    public function create()
    {
		//
    }


    public function store(Request $request)
    {
		//
    }


    public function show($id)
    {
		//
    }


    public function edit($id)
    {
        $payment	= Option::find($id);
        return view('admin.payments.addedit',compact('payment'));
    }


    public function update(Request $request, $id)
    {
		$data = $request->all();
		
        $this->validate($request, [
            //'opt_text' => 'required'
        ]);
		
		if($file = $request->hasFile('opt_image')) {
				$file = $request->file('opt_image') ;
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/option/' ;
				$file->move($destinationPath,$fileName);
				$opt_image = $fileName ;
			}
		
		$payment = ['opt_text' => $data['opt_text'],'opt_status' => $data['opt_status']];
		
		if(isset($opt_image))
			$payment['opt_image'] = $opt_image;
	
		Option::find($id)->update($payment);
		
        return redirect()->route('admin.payments.index')
                        ->with('success','Payment method updated successfully');

    }


    public function destroy($id)
    {
		//
    }
	
}