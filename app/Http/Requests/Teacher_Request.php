<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class Teacher_Request extends Request {

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
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255',
					'email' => 'required|email|max:255|unique:users',
					'password' => 'required|min:6',
					'te_school_id' => 'required|numeric',
					'country_id' => 'required|numeric',
					'state_id' => 'required|numeric',
					'dob' => 'required|date_format:d/m/Y',
					'te_contact_no' => 'numeric',
					'te_profession' => 'max:255',
					'te_skillset' => 'max:255',
					'te_level' => 'numeric',
					'te_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'	 
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255',
					'te_school_id' => 'required|numeric',
					'country_id' => 'required|numeric',
					'state_id' => 'required|numeric',
					'dob' => 'required|date_format:d/m/Y',
					'te_contact_no' => 'numeric',
					'te_profession' => 'max:255',
					'te_skillset' => 'max:255',
					'te_level' => 'numeric',
					'te_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'		 
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
			'nu_contact_no' => 'Contact Number',
			'te_profession' => 'Profession',
			'te_skillset' => 'Skillset',
			'te_level' => 'Level',
			'dob' => 'Date of Birth',
			'mobile' => 'Mobile Number',
			'phone' => 'Phone Number',
			'website' => 'Website Number',
			'te_image' => 'Profile image',
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