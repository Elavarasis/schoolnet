<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Normal_user extends Model
{
    public $fillable = ['nu_user_id','nu_class','nu_contact_no','nu_hcyknow','nu_description'];
	
}