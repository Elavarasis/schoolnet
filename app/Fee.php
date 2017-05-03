<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
	protected $table = 'fee';
    public $fillable = ['fee_name','fee_amount','fee_description','fee_school_id','fee_status'];
}