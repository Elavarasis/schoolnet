<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
	public $fillable = ['frnd_user_id','frnd_friend_id','frnd_status'];
	
}