<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\User;

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
					'designation' => 'required|max:255',
					'dob' => 'required|date_format:d/m/Y',
					'phone' => 'numeric',
					'mobile' => 'required|numeric',
					'website' => 'url|max:255',
					'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255',
					//'email' => 'required|email|max:255|unique:users,email'.$user_id,
					'designation' => 'required|max:255',
					'dob' => 'required|date_format:d/m/Y',
					'phone' => 'numeric',
					'mobile' => 'required|numeric',
					'website' => 'url|max:255',
					'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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