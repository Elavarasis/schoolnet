<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class Leave_Request extends Request {

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
					'lv_totaldays' => 'required',
					'lv_start_date' => 'required|date_format:m/d/Y',
					'lv_end_date' => 'required|date_format:m/d/Y',
					'lv_reason' => 'required|max:1500'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'lv_totaldays' => 'required',
					'lv_start_date' => 'required|date_format:m/d/Y',
					'lv_end_date' => 'required|date_format:m/d/Y',
					'lv_reason' => 'required|max:1500'		 
				];
			}
			default:break;
		}

	}
	
	public function attributes()
    {
        return [
            'lv_totaldays' => 'Total Days',
			'lv_start_date' => 'From Date',
			'lv_end_date' => 'To Date',
			'lv_reason' => 'Reason',
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