<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_paid extends Model
{
    protected $table = 'fee_paid';
	public $fillable = ['fp_user_id','fp_fee_id','fp_amount','fp_description','fp_status'];
	
}