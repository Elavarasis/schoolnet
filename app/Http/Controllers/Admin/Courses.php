<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Student_Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\School;
use DB;
use Image;
use Redirect;
class Courses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
		$title		=	'Courses';
		$courses 	=	DB::table('courses as c1')
						->join('schools', 'c1.course_school_id', '=', 'schools.id')
						->leftJoin('courses as c2', 'c1.course_parent', '=', 'c2.id')
            			->select('c1.*', 'c2.course_title as parent_name','schools.schl_name')
						->where('c1.course_parent', 0)
						->orderBy('c1.course_title', 'asc')
            			->get();
						
		return view('admin.courses.index',compact('courses','title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
		$schools 	= [''=>'Please select'] + School::orderBy('schl_name')->pluck('schl_name', 'id')->all();
		$courses 	= ['0'=>'select'] + Course::orderBy('course_title')->pluck('course_title', 'id')->all();
		return view('admin.courses.addedit',compact('courses','schools'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
		
        $data = $request->all();
		
		$this->validate($request, [
            'course_title' => 'required',
			'course_school_id' => 'required',
        ]);
		
		if($file = $request->hasFile('course_image')) {
            
				$file = $request->file('course_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/course/' ;
				
				Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
				Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
				$file->move($destinationPath, IMG_PREFIX.$fileName);
				$course_image = IMG_PREFIX.$fileName;
			
			}	
		
		$course_slug = str_slug($data['course_title'] , "-");
		
		$cat_id = Course::create([
            'course_title' => $data['course_title'],
            'course_slug' => $course_slug,
			'course_short_desc' => $data['course_short_desc'],
			'course_description' => $data['course_description'],
			'course_duration' => $data['course_duration'],
			'course_fee' => $data['course_fee'],
            'course_parent' => (isset($data['course_parent'])) ? $data['course_parent'] : 0,
            'course_image' => (isset($course_image)) ? $course_image : '',
			'course_video_url' => $data['course_video_url'],
			'course_school_id' => $data['course_school_id'],
			'course_featured' => $data['course_featured'],
            'course_status' => $data['course_status'],
        ])->id;
		
		if($cat_id){
			return redirect()->route('admin.courses.index')->with('success','Course added successfully');			
		} else {
			return redirect()->route('admin.courses.index')->with('error','Something went wrong, please try again later');	
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
        $course = Course::find($id);
        return view('admin.courses.show',compact('course'));
    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
		$courses 	= ['0'=>'select'] + Course::orderBy('course_title')->pluck('course_title', 'id')->all();
		$schools 	= [''=>'Please select'] + School::orderBy('schl_name')->pluck('schl_name', 'id')->all();
		$course		= Course::find($id);
        return view('admin.courses.addedit',compact('courses','course','schools'));
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
		
		$course_image = '';
		$data = $request->all();
		
		$this->validate($request, [
            'course_title' => 'required',
			'course_school_id' => 'required',
        ]);
		
		if($file = $request->hasFile('course_image')) {
		
			$file = $request->file('course_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/course/' ;
			
			Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
			Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
			$file->move($destinationPath, IMG_PREFIX.$fileName);
			$course_image = IMG_PREFIX.$fileName;
		}
		
		$course = [
				'course_title' => $data['course_title'],
				'course_short_desc' => $data['course_short_desc'],
				'course_description' => $data['course_description'],
				'course_duration' => $data['course_duration'],
				'course_fee' => $data['course_fee'],
				'course_parent' => (isset($data['course_parent'])) ? $data['course_parent'] : 0,
				'course_school_id' => $data['course_school_id'],
				'course_video_url' => $data['course_video_url'],
				'course_featured' => $data['course_featured'],
				'course_status' => $data['course_status'],
				];
		
		if(!empty($course_image))
			$course['course_image']	=	$course_image;
		
		Course::find($id)->update($course);
		
		return redirect()->route('admin.courses.index')->with('success','Course updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {	
        Course::find($id)->delete();
        return redirect()->route('admin.courses.index')->with('success','Course deleted successfully');
    }
	
	
	public function sub($parent_id)
    {
		$title		=	'Sub Courses';
		$courses 	=	DB::table('courses as c1')
						->join('schools', 'c1.course_school_id', '=', 'schools.id')
						->leftJoin('courses as c2', 'c1.course_parent', '=', 'c2.id')
            			->select('c1.*', 'c2.course_title as parent_name','schools.schl_name')
						->where('c1.course_parent', $parent_id)
						->orderBy('c1.course_title', 'asc')
            			->get();
		
		return view('admin.courses.index',compact('courses','title'));
    }
	
}