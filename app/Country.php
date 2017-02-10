<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'countries';
    public $fillable = ['iso','iso3','fips','country','continent','currency_code','currency_name','postal_code','languages','geonameid','country_status'];
	
}