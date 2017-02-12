<?php 

namespace App\Http\Requests;

use App\Http\Requests\Request;

class School_Admin_Request extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		
		return [
			'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
			'designation' => 'required|max:255',
			'dob' => 'required|date_format:d/m/Y',
			'phone' => 'numeric',
			'mobile' => 'required|numeric',
			'website' => 'url|max:255',
			'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
			 
		];
	}
	
	public function messages()
	{
		return [
				'first_name.required' => 'The Category name field is required.',	
				'last_name.required' => 'The Category name field is required.',	
				'designation.required' => 'The Category name field is required.',	
				'dob.required' => 'The Category name field is required.',	
				'mobile.required' => 'The Category name field is required.',	
		];
	}
	
}