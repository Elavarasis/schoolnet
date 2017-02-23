<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
	protected $table = 'newsletters';
    public $fillable = ['nl_user_id','nl_email','status'];
	
}