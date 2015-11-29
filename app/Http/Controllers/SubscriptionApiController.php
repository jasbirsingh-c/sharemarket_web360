<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;

use Illuminate\Http\Request;
use Input, Validator, App\Subscription, DB;

class SubscriptionApiController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscription_data = Subscription::all();
		$subscription = $subscription_data->toJson();
		echo $subscription;
		die;
	}
}