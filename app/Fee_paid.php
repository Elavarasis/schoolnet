<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_paid extends Model
{
    protected $table = 'fee_paid';
	public $fillable = ['fp_user_id','fp_fee_id','fp_amount','fp_description','fp_status'];

    public function get_paid_fee()
    {
        return $this->belongsTo('App\Fee_student', 'fp_user_id', 'fs_user_id');
    }
}