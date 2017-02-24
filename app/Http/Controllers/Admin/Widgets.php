<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Option;
use Image;

class Widgets extends Controller
{

    public function index(Request $request)
    {
		$widgets = Option::where('opt_status','<>',2)->where('opt_type', 'widget')->orderBy('opt_key', 'asc')->get();
		return view('admin.widgets.index',compact('widgets'));
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
        $widget	= Option::find($id);
        return view('admin.widgets.addedit',compact('widget'));
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
				
				Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
				Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
				$file->move($destinationPath, IMG_PREFIX.$fileName);
				$opt_image = IMG_PREFIX.$fileName;				
			}
		
		$widget = ['opt_text' => $data['opt_text'],'opt_status' => $data['opt_status']];
		
		if(isset($opt_image))
			$widget['opt_image'] = $opt_image;
	
		Option::find($id)->update($widget);
		
        return redirect()->route('admin.widgets.index')
                        ->with('success','Widget updated successfully');

    }


    public function destroy($id)
    {
		//
    }
	
}