<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	protected $table = 'attentances';
    public $fillable = ['att_user_id','att_date','att_attentance','att_status'];
}