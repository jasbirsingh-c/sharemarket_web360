<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
		'subscription_name',
		'description',
		'amt',
		'segment',
		'msg_delivery',
		'jackpot_calls',
		'earlier_calls',
		'telephonic_support',
		'client_query',
		'msg_on_alert',
	];
}