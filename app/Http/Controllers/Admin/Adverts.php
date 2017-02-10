<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Option;

class Adverts extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$adverts = Option::where('opt_status','<>',2)->where('opt_type', 'advert')->orderBy('opt_key', 'asc')->get();
		return view('admin.adverts.index',compact('adverts'));
    }

    public function create()
    {
		return view('admin.adverts.addedit');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            //'opt_text' => 'required'
        ]);
		
		$data 	= 	$request->all(); 
		$advert	=	[
						'opt_key' => '',
						'opt_text' => '',
						'opt_type' => 'advert',
						'opt_status' => $data['opt_status']
					];
		
		if($file = $request->hasFile('opt_image')) {
				$file = $request->file('opt_image') ;
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/option/' ;
				$file->move($destinationPath,$fileName);
				$opt_image = $fileName ;
			}
			
		if(isset($opt_image))
			$advert['opt_image'] = $opt_image;
		
		Option::create($advert);
		
        return redirect()->route('admin.adverts.index')
                        ->with('success','Advert added successfully');

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
        $advert 	= Option::find($id);
        return view('admin.adverts.addedit',compact('advert'));
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

        $data = $request->all();
		
        $this->validate($request, [
            'opt_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
		if($file = $request->hasFile('opt_image')) {
				$file = $request->file('opt_image') ;
				$fileName = $file->getClientOriginalName() ;
				$destinationPath = public_path().'/images/option/' ;
				$file->move($destinationPath,$fileName);
				$opt_image = $fileName ;
			}
		
		$payment = ['opt_status' => $data['opt_status']];
		
		if(isset($opt_image))
			$payment['opt_image'] = $opt_image;
	
		Option::find($id)->update($payment);

        return redirect()->route('admin.adverts.index')
                        ->with('success','Advert updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {

        Option::find($id)->delete();

        return redirect()->route('admin.adverts.index')

                        ->with('success','Advert deleted successfully');

    }
	
	
	/* Get states by country id through ajax */
	public function getstates(Request $request)
	{
		$country 	= Country::find($request->input('c_id'));
		$states 	= State::where('region_id', $country->id)->get(['id','name']);
		if($request->ajax()){
			$res = response()->json([
				'states' => $states
			]);
			return $res;
		}
	}

	
}