<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Library\Messages;
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

		return back();
	}


	public function activate_account()
	{
		$this->validate($request, [
			'code' => 'required'
		]);

	}

	public function activate(Request $request)
	{
		//$this->validate($request, [
		//	'code' => 'required'
		//]);

		if ($user = App\User::where('activation_code', $request->input('code'))->first())
		{
			return view('auth/activate');
		}

		$request->session()->put('error','Acitvation code not valid');
		return view('blank');
	}
}
