<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facades\Messages;
use App\Http\Requests;
use App;

class UsersController extends Controller
{
	public function register(Request $request)
	{
		return view('auth/register');
	}



	public function create(Request $request)
	{
		$this->validate($request, [
			'email' => 'bail|required|email|unique:users'
		]);

		$user = new App\User;
		$user->email = $request->input('email');
		$user->activation_code = str_random(10); // create an activation code
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
		

		if ($user = App\User::where('activation_code', $request->input('code'))->first())
		{
			$user->first_name = $request->input('first_name');
			$user->last_name = $request->input('last_name');
			$user->mobile = $request->input('mobile');
			$user->password = bcrypt($request->input('password'));
			$user->activated = 1;
			$user->activation_code = null;
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
		if ($user = App\User::where('activation_code', $request->input('code'))->first())
		{
			return view('auth/activate', ['code' => $request->input('code')]);
		}

		Messages::error('Acitvation code not valid');
		return view('blank');
	}
}
