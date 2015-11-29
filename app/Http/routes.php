<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('middleware' => 'auth'), function()
{
	Route::get('/eod', 'EodController@index');
	Route::resource('subscriptions', 'SubscriptionsController');
	Route::resource('users', 'UsersController');
});

Route::resource('api/user', 'UserApiController',['except' => ['create', 'edit', 'destroy']]);
Route::resource('api/subscription', 'SubscriptionApiController',['except' => ['create', 'edit', 'destroy', 'update', 'store', 'show']]);
Route::post('/api/login', 'UserApiController@postLogin');
Route::post('/api/resetpassword', 'Auth\PasswordController@postEmailViaApi');
Route::post('/api/changepassword', 'Auth\PasswordController@postChangePasswordViaApi');
Route::post('/api/profile', 'UserApiController@getMyProfile');
Route::post('/api/updateprofile', 'UserApiController@updateProfile');
Route::post('/api/request-subscription', 'UserApiController@requestSubscription');
Route::resource('notifications', 'NotificationsController');