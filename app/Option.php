<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $fillable = ['opt_key','opt_text','opt_image','opt_type','opt_status'];
}