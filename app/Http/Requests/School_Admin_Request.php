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
			'first_name' 	=> 'required|max:255',
            'last_name' 	=> 'required|max:255',
            'email' 		=> 'required|email|max:255|unique:users',
            'password'		=> 'required|min:6',
			'designation'	=> 'required|max:255',
			'dob' 			=> 'date',
			'phone' 		=> 'max:255',
			'mobile' 		=> 'max:255',
			'website' 		=> 'max:255',
			'image' 		=> 'max:255',
			 
		];
	}
	
	/* public function messages()
	{
		return [
				'category_name.required' => 'The Category name field is required.',	
		];
	} */
	
}