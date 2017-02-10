<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Country;
use App\State;

class Countries extends Controller
{

    public function index(Request $request)
    {
		$countries = Country::orderBy('country_status', 'desc')->orderBy('country', 'asc')->get(['id','country','country_status']);
		return view('admin.countries-states.index',compact('countries'));
    }
	
	
	public function country_status(Request $request)
    {
		$data = $request->all();
		if($data['id'] == 0){ //update whole records
			$country = ['country_status' => $data['s']];
			Country::query()->update($country);
		} else { //update single record
			$country = ['country_status' => $data['s']];
			Country::find($data['id'])->update($country);
		}
    }
	
	public function state_status(Request $request)
    {
		$data = $request->all();
		if($data['id'] == 0){ //update whole records within the country
			$state = ['state_status' => $data['s']];
			State::where('region_id', '=', $data['cid'])->update($state);
		} else { //update single record
			$state = ['state_status' => $data['s']];
			State::find($data['id'])->update($state);
		}        
    }
	
	public function states($country_id)
	{
		$country 	= Country::find($country_id);
		$states 	= State::where('region_id', $country->id)->get(['id','name','state_status']);
		return view('admin.countries-states.states',compact('states','country'));
	}

	
}