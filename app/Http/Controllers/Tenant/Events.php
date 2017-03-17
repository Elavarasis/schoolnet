<?php
namespace App\Http\Controllers\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\Student_Request;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use Image;
use Redirect;

class Events extends Controller
{
    public function index(Request $request)
    {
		$events = Event::orderBy('id', 'desc')->get();
		return view('tenant.events.index',compact('events'));
    }

    public function create()
    {
		return view('tenant.events.addedit');
    }

    public function store(Request $request)
    {
		
        $data = $request->all();
		
		$this->validate($request, [
            'event_name' => 'required'
        ]);
		
		if($file = $request->hasFile('event_image')) {
            
				$file = $request->file('event_image') ;				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/event/' ;				
				Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
				Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
				$file->move($destinationPath, IMG_PREFIX.$fileName);
				$event_image = IMG_PREFIX.$fileName;
			
			}
		
		$event_id = Event::create([
            'event_name' => $data['event_name'],
            'event_description' => $data['event_description'],
            'event_venue' => $data['event_venue'],
            'event_startDate' => date("Y-m-d", strtotime($data['event_startDate'])),
			'event_endDate' => date("Y-m-d", strtotime($data['event_endDate'])),
            'event_image' => (isset($event_image)) ? $event_image : '',
            'event_status' => $data['event_status'],
        ])->id;
		
		if($event_id){
			return redirect()->route('tenant.events.index')->with('success','Event added successfully');			
		} else {
			return redirect()->route('tenant.events.index')->with('error','Something went wrong, please try again later');	
		}
		
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$event	= Event::find($id);
        return view('tenant.events.addedit',compact('event'));
    }
	

    public function update(Request $request, $id)
    {	
		$event_image = '';
		$data = $request->all();
		
		$this->validate($request, [
            'event_name' => 'required'
        ]);
		
		if($file = $request->hasFile('event_image')) {
		
			$file = $request->file('event_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/student/' ;
			
			Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
			Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
			$file->move($destinationPath, IMG_PREFIX.$fileName);
			$event_image = IMG_PREFIX.$fileName;
		}
		
		$event = [
				'event_name' => $data['event_name'],
				'event_description' => $data['event_description'],
				'event_venue' => $data['event_venue'],
				'event_startDate' => date("Y-m-d", strtotime($data['event_startDate'])),
				'event_endDate' => date("Y-m-d", strtotime($data['event_endDate'])),
				'event_status' => $data['event_status'],
				];
		
		if(!empty($event_image))
			$event['event_image']=$event_image;
		
		Event::find($id)->update($event);
		
		return redirect()->route('tenant.events.index')->with('success','Event updated successfully');
    }


    public function destroy($id)
    {	
        Event::find($id)->delete();
        return redirect()->route('tenant.events.index')->with('success','Event deleted successfully');
    }
	
}