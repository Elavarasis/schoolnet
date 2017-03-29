<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
	protected $table = 'leaves';
    public $fillable = ['lv_user_id','lv_applicant','lv_totaldays','lv_start_date','lv_start_time','lv_end_date','lv_end_time','lv_reason','lv_user_del','lv_parent_del','lv_tenant_del','lv_status','lv_remarks'];
	
	public function user()
    {
        return $this->hasOne('App\User','id','lv_user_id');
    }
	
	public function applicant()
    {
        return $this->hasOne('App\User','id','lv_applicant');
    }
}