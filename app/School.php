<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $fillable = ['schl_user_id','schl_name','schl_country_id','schl_state_id','schl_city_id','schl_address','schl_contact_no','schl_email','schl_level','schl_features','schl_logo','schl_status'];
	
	public function get_basic_details()
    {
        return $this->hasOne('App\User','id','schl_user_id');
		return $this->hasOne('App\Country','id','schl_country_id');
		return $this->hasOne('App\State','id','schl_state_id');
		return $this->hasOne('App\City','id','schl_city_id');
    }
}