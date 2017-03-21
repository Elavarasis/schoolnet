<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\City;
use App\Country;
use App\State;
use Excel;
use DB;

class Cities extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
		$cities = City::where('status','<>',2)->orderBy('city_name', 'asc')->get();
		return view('admin.cities.index',compact('cities'));
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

	 //$countries 	= Country::where('status', 1)->orderBy('country')->pluck('country', 'id');
	 //$countries	= Country::lists('country', 'id'); //version below 5.2 use 'lists' instead of 'pluck'
     */

    public function create()
    {
        $countries	= Country::where('country_status',1)->pluck('country', 'id' );
		$states		= array();
		return view('admin.cities.addedit',compact('countries','states'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'city_name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);

        City::create($request->all());

        return redirect()->route('admin.cities.index')

                        ->with('success','City added successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)
    {

        $city = City::find($id);
        return view('admin.cities.show',compact('city'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
        $city 		= City::find($id);
		$countries	= Country::where('country_status',1)->pluck('country', 'id');
		$states 	= State::where('region_id', $city->country_id)->where('state_status',1)->orderBy('name')->pluck('name', 'id');
        return view('admin.cities.addedit',compact('city','countries','states'));
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

        $this->validate($request, [
            'city_name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);

        City::find($id)->update($request->all());

        return redirect()->route('admin.cities.index')
                        ->with('success','City updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {

        City::find($id)->delete();

        return redirect()->route('admin.cities.index')

                        ->with('success','City deleted successfully');

    }
	
	
	/* Get states by country id through ajax */
	public function getstates(Request $request)
	{
		$country 	= Country::find($request->input('c_id'));
		$states 	= State::where('region_id', $country->id)->where('state_status',1)->get(['id','name']);
		if($request->ajax()){
			$res = response()->json([
				'states' => $states
			]);
			return $res;
		}
	}
	
	
	/* import */
	public function import()
	{
		return view('admin.cities.import');
	}
	
	public function import_now(Request $request)
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {

			})->get();
			
			$insert	=	array();
			if(!empty($data) && $data->count()){

				foreach ($data as $key => $value) {
					foreach ($value as $row)
					{
						var_dump($row->city);
						$insert[] = [
									'city_name' => $row->city,
									'state_id' => $row->state,
									'country_id' => $row->country,
									'status' => $row->status,
									];
					}
				}

				/*if(!empty($insert)){
					DB::table('cities')->insert($insert);
					dd('Insert Record successfully.');
				}*/
			}
		}

		//return back();
	}

	
}