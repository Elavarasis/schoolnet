<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class School_Request extends Request {

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
					'schl_name' => 'required|max:255',
					'schl_country_id' => 'required|numeric',
					'schl_state_id' => 'required|numeric',
					'schl_city_id' => 'required|numeric',
					'schl_contact_no' => 'numeric',
					'email' => 'email|max:255',
					'schl_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'		 
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'schl_name' => 'required|max:255',
					'schl_country_id' => 'required|numeric',
					'schl_state_id' => 'required|numeric',
					'schl_city_id' => 'required|numeric',
					'schl_contact_no' => 'numeric',
					'email' => 'email|max:255',
					'schl_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'		 
				];
			}
			default:break;
		}

	}
	
	public function attributes()
    {
        return [
            'schl_name' => 'School Name',
			'schl_country_id' => 'Country',
			'schl_state_id' => 'State',
			'schl_city_id' => 'City',
			'schl_contact_no' => 'Contact Number',
			'email' => 'Email',
			'schl_logo' => 'School Logo'
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