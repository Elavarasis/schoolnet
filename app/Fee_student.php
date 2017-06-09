<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_student extends Model
{
    protected $table = 'fee_students';
	public $fillable = ['fs_fee_id','fs_user_id','fs_status'];

    public function get_fee()
    {
        return $this->hasOne('App\Fee','id','fs_fee_id');
    }
    public function get_paid_fee()
    {
        return $this->hasMany('App\Fee_paid','fp_user_id','fs_user_id');
    }
}
