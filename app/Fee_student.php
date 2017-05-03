<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_student extends Model
{
    protected $table = 'fee_students';
	public $fillable = ['fs_fee_id','fs_user_id','fs_status'];
	
}