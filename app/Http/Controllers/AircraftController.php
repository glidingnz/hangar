<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AircraftController extends Controller
{
	public function index()
	{
		return view('aircraft/aircraft-list');
	}
}
