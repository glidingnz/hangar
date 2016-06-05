<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facades\Messages;
use App\Http\Requests;
use App;
use Auth;
use Validator;

class UsersController extends Controller
{
	public function register(Request $request)
	{
		return view('auth/register');
	}


	public function view_account()
	{
		$user = Auth::user();

		return view('account', $user);
	}


	public function update_account(Request $request)
	{
		$user = Auth::user();
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email,' . $user->id,
			'first_name' => 'required',
			'last_name' => 'required'
		]);
		if ($validator->passes())
		{
			// update details
			$updated_user = App\Models\User::find($user->id);

			// check if we need to validate the email again
			if ($user->email != $request->input('email'))
			{
				$updated_user->activated=false;
				$request->session()->flash('warning', 'You\'ll need to re-validate your email address. Check your email and follow the instructions');
			}

			$updated_user->email = $request->input('email');
			$updated_user->first_name = $request->input('first_name');
			$updated_user->last_name = $request->input('last_name');
			$updated_user->gnz_id = $request->input('gnz_id', 0);
			$updated_user->save();

			$request->session()->flash('success', 'Account Updated');
		}
		return redirect('/account')->withInput()->withErrors($validator);
	}




	public function create(Request $request)
	{
		$this->validate($request, [
			'email' => 'bail|required|email|unique:users'
		]);

		$user = new App\Models\User;
		$user->email = $request->input('email');
		$user->activation_code = str_random(10); // create an activation code
		$user->api_token = str_random(60); // create an activation code
		$user->save();

		Messages::success('Account Created. Check your email to activate your account.');
		return view('blank');
	}



	public function activate_post(Request $request)
	{

		$this->validate($request, [
			'code' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'mobile' => 'required',
			'password' => 'required|min:4|confirmed'
		]);
		

		if ($user = App\Models\User::where('activation_code', $request->input('code'))->first())
		{
			$user->first_name = $request->input('first_name');
			$user->last_name = $request->input('last_name');
			$user->mobile = $request->input('mobile');
			$user->password = bcrypt($request->input('password'));
			$user->activated = 1;
			$user->activation_code = null;
			$user->user_level = 255;
			$user->save();
			Messages::success('Account Activated');
		}
		else
		{
			Messages::error('Acitvation code not valid');
		}

		return view('blank');
	}




	public function activate(Request $request)
	{
		if ($user = App\Models\User::where('activation_code', $request->input('code'))->first())
		{
			return view('auth/activate', ['code' => $request->input('code')]);
		}

		Messages::error('Acitvation code not valid');
		return view('blank');
	}

	public function send_activation_email()
	{
		
	}
}
