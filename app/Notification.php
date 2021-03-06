<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
		'user_id',
		'title',
		'description',
		'image_url',
		'type',
	];
    
    public $timestamps = true;
}