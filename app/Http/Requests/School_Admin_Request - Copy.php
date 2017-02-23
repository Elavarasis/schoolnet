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
		$rules =  [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'designation' => 'required|max:255',
			'dob' => 'required|date_format:d/m/Y',
			'phone' => 'numeric',
			'mobile' => 'required|numeric',
			'website' => 'url|max:255',
			'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'			 
		];
		
		if( $this->method() == 'POST' ){

			$rules['email'] = 'required|email|max:255|unique:users';
			$rules['password'] = 'required|min:6';
		}
		
		return $rules;
	}
	
	public function attributes()
    {
        return [
            'first_name' => 'First Name',
			'email' => 'Email',
			'password' => 'Password',
			'last_name' => 'Last Name',
			'designation' => 'Designation',
			'dob' => 'Date of Birth',
			'mobile' => 'Mobile Number',
			'phone' => 'Phone Number',
			'website' => 'Website Number',
			'profile_image' => 'Profile image',
        ];
    }
	
}