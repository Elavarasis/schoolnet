<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $table = 'states';
	public $fillable = ['region_id','name','timezone','state_status'];
}