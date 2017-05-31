<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_tutor extends Model
{
    protected $table = 'course_tutors';
	public $fillable = ['ct_course_id','ct_user_id','ct_status'];
	
	public function get_user()
    {
        return $this->hasOne('App\User','id','ct_user_id');
    }
	
	public function get_teacher()
    {
        return $this->hasOne('App\Teacher','te_user_id','ct_user_id');
    }
}