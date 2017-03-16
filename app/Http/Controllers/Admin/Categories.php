<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Student_Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Image;
use Redirect;
class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
		$categories =	DB::table('categories as c1')
						->leftJoin('categories as c2', 'c1.cat_parent', '=', 'c2.id')
            			->select('c1.*', 'c2.cat_name as parent_name')
						->where('c1.cat_status', '!=' , 2)
						->orderBy('c1.cat_name', 'asc')
            			->get();
						
		return view('admin.categories.index',compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
		$categories = ['0'=>'select'] + Category::where('cat_status', '!=' , 2)->orderBy('cat_name')->pluck('cat_name', 'id')->all();
		return view('admin.categories.addedit',compact('categories'));
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
            'cat_name' => 'required'
        ]);
		
		if($file = $request->hasFile('cat_image')) {
            
				$file = $request->file('cat_image') ;
				
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/category/' ;
				
				Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
				Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
				$file->move($destinationPath, IMG_PREFIX.$fileName);
				$cat_image = IMG_PREFIX.$fileName;
			
			}	
		
		$cat_slug = (!empty($data['cat_slug'])) ? str_slug($data['cat_slug'] , "-") : str_slug($data['cat_name'] , "-");
		
		$cat_id = Category::create([
            'cat_name' => $data['cat_name'],
            'cat_slug' => $cat_slug,
            'cat_parent' => (isset($data['cat_parent'])) ? $data['cat_parent'] : 0,
            'cat_type' => 'main',
            'cat_image' => (isset($cat_image)) ? $cat_image : '',
            'cat_status' => $data['cat_status'],
        ])->id;
		
		if($cat_id){
			return redirect()->route('admin.categories.index')->with('success','Category added successfully');			
		} else {
			return redirect()->route('admin.categories.index')->with('error','Something went wrong, please try again later');	
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
		$categories = ['0'=>'select'] + Category::where('cat_status', '!=' , 2)->orderBy('cat_name')->pluck('cat_name', 'id')->all();
		$category	= Category::find($id);
        return view('admin.categories.addedit',compact('categories','category'));
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
		
		$cat_image = '';
		$data = $request->all();
		
		$this->validate($request, [
            'cat_name' => 'required'
        ]);
		
		if($file = $request->hasFile('cat_image')) {
		
			$file = $request->file('cat_image') ;
			
			$fileName = $file->getClientOriginalName() ;
			$destinationPath = public_path().'/images/student/' ;
			
			Image::make($file->getRealPath())->resize(IMG_SW, IMG_SH)->save($destinationPath . 'small--'.IMG_PREFIX.$fileName);
			Image::make($file->getRealPath())->resize(IMG_MW, IMG_MH)->save($destinationPath . 'medium--'.IMG_PREFIX.$fileName);
			$file->move($destinationPath, IMG_PREFIX.$fileName);
			$cat_image = IMG_PREFIX.$fileName;
		}
		
		$cat_slug = (!empty($data['cat_slug'])) ? str_slug($data['cat_slug'] , "-") : str_slug($data['cat_name'] , "-");
		
		$category = [
				'cat_name' => $data['cat_name'],
				'cat_slug' => $cat_slug,
				'cat_parent' => (isset($data['cat_parent'])) ? $data['cat_parent'] : 0,
				'cat_status' => $data['cat_status'],
				];
		
		if(!empty($cat_image))
			$category['cat_image']=$cat_image;
		
		Category::find($id)->update($category);
		
		return redirect()->route('admin.categories.index')->with('success','Category updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {	
        Category::find($id)->update(['cat_status'=>'2']);
        return redirect()->route('admin.categories.index')->with('success','Category deleted successfully');
    }
	
}