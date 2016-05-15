<?php

namespace App\Api\v1\Controllers;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class OrgsController extends Controller
{
	public function index()
	{
		return User::all();
	}
}
