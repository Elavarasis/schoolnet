<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class Student_Request extends Request {

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
		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'st_reg_no' => 'stud_regno',
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255',
					'email' => 'required|email|max:255|unique:users',
					'password' => 'required|min:6',
					'st_school_id' => 'required|numeric',
					'st_parent_id' => 'required|numeric',
					'country_id' => 'required|numeric',
					'state_id' => 'required|numeric',
					'dob' => 'required|date_format:d/m/Y',
					'st_contact_no' => 'numeric',
					'st_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'	 
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'st_reg_no' => 'stud_regno',
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255',
					'st_school_id' => 'required|numeric',
					'st_parent_id' => 'required|numeric',
					'country_id' => 'required|numeric',
					'state_id' => 'required|numeric',
					'dob' => 'required|date_format:d/m/Y',
					'st_contact_no' => 'numeric',
					'st_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'		 
				];
			}
			default:break;
		}

	}
	
	public function attributes()
    {
        return [
            'first_name' => 'First Name',
			'email' => 'Email',
			'last_name' => 'Last Name',
			'st_school_id' => 'School',
			'st_parent_id' => 'Parent',
			'nu_contact_no' => 'Contact Number',
			'dob' => 'Date of Birth',
			'mobile' => 'Mobile Number',
			'phone' => 'Phone Number',
			'website' => 'Website Number',
			'st_image' => 'Profile image',
        ];
    }
	
	public function messages()
	{
		return [
				//'first_name.required' => ':attribute is required.',	
				//'last_name.required' => ':attribute is required.',	
		];
	}
	
}