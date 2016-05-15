<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class GnzMembersApiController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	public function index(Request $request)
	{
		$data['admin']='NO';
		if (Auth::guard('api')->user()->can('admin')) {
			$data['admin']='YES';
		}
		$data['success']='true';
		return $data;
	}
}
