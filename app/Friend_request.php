<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend_request extends Model
{
    protected $table = 'friend_requests';
	public $fillable = ['freq_user_id','freq_to_user_id','freq_response','freq_status'];
	
}