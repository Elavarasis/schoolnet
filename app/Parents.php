<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    public $fillable = ['pa_user_id','pa_school_id','pa_address','pa_contact_no','pa_hcyknow','pa_description'];
	
}