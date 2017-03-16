<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = 'courses';
    public $fillable = ['course_title','course_description','course_duration','course_fee','course_parent','course_image','course_status'];
}