<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = ['st_user_id','st_school_id','st_class','st_address','st_city','st_country_id','st_state_id','st_dob','st_contact_no','st_hcyknow','st_description','st_image','st_status'];
	
	public function get_basic_details()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}