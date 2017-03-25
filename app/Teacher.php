<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $fillable = ['te_user_id','te_school_id', 'te_contact_no','te_profession','te_skillset','te_level','te_hcyknow'];
	
}