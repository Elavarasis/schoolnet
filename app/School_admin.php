<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class School_admin extends Model
{
	protected $table = 'school_admin';
    public $fillable = ['user_id','designation','dob','phone','mobile','website','image'];
	
	public function get_basic_details()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}