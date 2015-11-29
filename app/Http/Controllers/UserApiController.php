<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input, Validator, App\User, DB;

class UserApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		echo 'hi';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$json_data = file_get_contents('php://input');
		$response = array();
		
		$input = json_decode($json_data, true);		
		
		$validation = Validator::make($input, [
							'name' => 'required|max:255',
							'contact_no' => 'required|max:14|min:10',
							'email' => 'required|email|max:255|unique:users',
							'password' => 'required|confirmed|min:6',
						]);

		if ($validation->passes())
		{
			$input['password'] = bcrypt($input['password']);
			User::create($input);
			$response['status'] = 'success';
			$response['msg'] = 'User created successfully';
		}
		else
		{
			$response['status'] = 'error';
			
			$errors = $validation->errors();
			$array_errors = $errors->all();
			$response['msg'] = $array_errors;			
		}
		echo json_encode($response);
		die;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function postLogin()
	{
		$json_data = file_get_contents('php://input');
		$input = json_decode($json_data, true);
		
		$validation = Validator::make($input, [
				'email' => 'required|email', 'password' => 'required',
				]);				
	
		$email = $input['email'];
		$password = $input['password'];
		
		if ($validation->passes())
		{		
			if (\Auth::attempt(['email' => $email, 'password' => $password]))
			{
				$response['status'] = 'success';
				$response['msg'] = 'Login successful';
				$user = \Auth::user();
				$response['user_details'] = array('id' => $user->id, 'name' => $user->name);
				$token = bin2hex(openssl_random_pseudo_bytes(16));
				$user->token = $token;
				$user->device_id = $input['device_id'];
				$user->os_type = $input['os_type'];
				$user->save();
				
				$response['token'] = $token;
				
			}
			else
			{
				$response['status'] = 'error';
				$response['msg'] = 'These credentials do not match';				
			}
		}
		echo json_encode($response);
		die;
	}		
	
	public function getMyProfile()
	{
		$json_data = file_get_contents('php://input');
		$input = json_decode($json_data, true);
		
		$validation = Validator::make($input, [
				'token' => 'exists:users|required',
				'id' => 'exists:users|required'
				]);
		
		if($validation->passes())
		{
			$user = User::find($input['id']);
			if($input['token'] == $user->token)
			{
				$result['status'] = 'success';
				$result['data'] = $user;
				$result['msg'] = 'My Profile';
			}
			else
			{
				$result['status'] = 'error';
				$result['msg'] = 'Token mismatch error';
			}
		}
		else
		{
			$result['status'] = 'error';
		
			$errors = $validation->errors();
			$array_errors = $errors->all();
			$result['msg'] = $array_errors;
		}
		echo json_encode($result);
		die;		
	}	
	
	public function updateProfile()
	{
		$json_data = file_get_contents('php://input');
		$input = json_decode($json_data, true);
		
		$validation = Validator::make($input, [
				'token' => 'exists:users|required',
				'id' => 'exists:users|required'
				]);
		
		if($validation->passes())
		{
			$user = User::find($input['id']);
			if($input['token'] == $user->token)
			{
				if(isset($input['name']) && $input['name'] != '')
					$user->name = $input['name'];
		
				if(isset($input['contact_no']) && $input['contact_no'] != '')
					$user->contact_no = $input['contact_no'];
		
				$user->save();
					
				$result['status'] = 'success';
				$result['msg'] = 'Profile updated sucessfully';
			}
			else
			{
				$result['status'] = 'error';
				$result['msg'] = 'Token mismatch error';
			}
		}
		else
		{
			$result['status'] = 'error';
		
			$errors = $validation->errors();
			$array_errors = $errors->all();
			$result['msg'] = $array_errors;
		}
		echo json_encode($result);
		die;		
	}	
	
	public function requestSubscription()
	{
		$json_data = file_get_contents('php://input');
		$input = json_decode($json_data, true);
	
		$validation = Validator::make($input, [
				'token' => 'exists:users|required',
				'id' => 'exists:users|required',
				'subscription' => 'exists:subscriptions,id|required'
				]);
	
		if($validation->passes())
		{
			$user = User::find($input['id']);
			if($input['token'] == $user->token)
			{
				$result['status'] = 'success';
				// Here save into notification table for admin to see
				
				//$result['data'] = $user;
				$result['msg'] = 'Request Sent';
			}
			else
			{
				$result['status'] = 'error';
				$result['msg'] = 'Token mismatch error';
			}
		}
		else
		{
			$result['status'] = 'error';
	
			$errors = $validation->errors();
			$array_errors = $errors->all();
			$result['msg'] = $array_errors;
		}
		echo json_encode($result);
		die;
	}		
}
