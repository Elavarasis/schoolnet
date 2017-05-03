<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
	protected $table = 'marks';
    public $fillable = ['mrk_user_id','mrk_reg_no','mrk_exam_name','mrk_subject','mrk_total_mark','mrk_pass_mark','mrk_mark_got','mrk_date','mrk_status'];
}