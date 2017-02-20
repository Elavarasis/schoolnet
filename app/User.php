<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role', 'status', 'address', 'city','country_id','state_id','image','dob',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function get_school_admin()
    {
        return $this->hasOne('App\School_admin','user_id','id');
    }
	
	public function get_student()
    {
        return $this->hasOne('App\Student','st_user_id','id');
    }
	public function get_normal_user()
    {
        return $this->hasOne('App\Normal_user','nu_user_id','id');
    }
}
