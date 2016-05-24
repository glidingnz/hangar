<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\ApiController;
use App\Models\Aircraft;

class AircraftController extends ApiController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$queryAircraft = Aircraft::query();
		switch ($request->input('type'))
		{
			case 'glider':
				$queryAircraft->where('class','=','Glider');
				$queryAircraft->orWhere('class','=','Power Glider');
				$queryAircraft->orWhere('class','=','Amateur Built Glider');
				break;
			case 'plane':
			case 'aeroplane':
				$queryAircraft->where('class','=','Aeroplane');
				$queryAircraft->orWhere('class','=','Amateur Built Aeroplane');
				break;
			case 'microlight':
				$queryAircraft->where('class','=','Microlight Class 1');
				$queryAircraft->orWhere('class','=','Microlight Class 2');
				break;
			case 'gyrocopter':
			case 'gyroplane':
			case 'gyro':
				$queryAircraft->where('class','=','Gyroplane');
				break;
			case 'helicopter':
				$queryAircraft->where('class','=','Helicopter');
				$queryAircraft->orWhere('class','=','Amateur Built Helicopter');
				break;
			case 'balloon':
				$queryAircraft->where('class','=','Balloon');
				break;
		}

		// case 'Aeroplane':
		// case 'Amateur Built Aeroplane':
		// case 'Amateur Built Glider':
		// case 'Amateur Built Helicopter':
		// case 'Balloon':
		// case 'Glider':
		// case 'Gyroplane':
		// case 'Helicopter':
		// case 'Microlight Class 1':
		// case 'Microlight Class 2':
		// case 'Power Glider':

		if ($aircraft = $queryAircraft->paginate(15))
		{
			return $this->success($aircraft, TRUE);
		}
		return $this->error(); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if ($aircraft = Aircraft::all())
		{
			return $this->success($aircraft);
		}
		return $this->error();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
