<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'cities';
    public $fillable = ['city_name','state_id','country_id','status'];
	
	public function get_country()
    {
        return $this->hasOne('App\Country','id','country_id')->select(['country']);
    }
	public function get_state()
    {
        return $this->hasOne('App\State','id','state_id')->select(['name']);
    }
}