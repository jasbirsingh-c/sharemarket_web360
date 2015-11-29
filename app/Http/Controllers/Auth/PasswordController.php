<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Input, Validator, DB, App\User;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
	
	public function postEmailViaApi()
	{
		$json_data = file_get_contents('php://input');
		$input = json_decode($json_data, true);
		
		$validation = Validator::make($input, [
				'email' => 'exists:users|required|email'
				]);
		//$this->validate($request, ['email' => 'required|email']);
		if ($validation->passes())
		{
			$response = $this->passwords->sendResetLink(array('email' => $input['email']), function($m)
			{
				$m->subject($this->getEmailSubject());
			});
			
			switch ($response)
			{
				case PasswordBroker::RESET_LINK_SENT:
					//return redirect()->back()->with('status', trans($response));
					//print_r(trans($response));
					$result['status'] = 'success';
					$result['msg'] = trans($response);					
					break;
			
				case PasswordBroker::INVALID_USER:
					//return redirect()->back()->withErrors(['email' => trans($response)]);
					$result['status'] = 'error';
					$result['msg'] = trans($response);							
					break;
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
	
	public function postChangePasswordViaApi()
	{
		$json_data = file_get_contents('php://input');
		$input = json_decode($json_data, true);
		
		$validation = Validator::make($input, [
				'token' => 'exists:users|required',
				'id' => 'exists:users|required',
				'password' => 'required|confirmed',
				]);		
	
		if($validation->passes())
		{
			$user = User::find($input['id']);
			if($input['token'] == $user->token)
			{
				$user->password = bcrypt($input['password']);
				$user->save();
				$result['status'] = 'success';
				$result['msg'] = 'Password changed successfully';
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
