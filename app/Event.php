<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';
    public $fillable = ['event_name','event_description','event_venue','event_startDate','event_endDate','event_image','event_status'];
}