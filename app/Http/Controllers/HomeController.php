<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the apps list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function switchOrg(Request $request)
	{
		//if ($request->user()->can('admin')) echo 'yah';
		return view('switchorg');
	}

	/**
	 * Show the apps list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		//if ($request->user()->can('admin')) echo 'yah';
		return view('home');
	}


	/**
	 * Show the apps list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apps(Request $request)
	{
		$data['org'] = $request->attributes->get('org');
		//if ($request->user()->can('admin')) echo 'yah';
		return view('apps', $data);
	}
}
