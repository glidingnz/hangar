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
		$queryAircraft->orderBy('rego');

		if ($request->input('search'))
		{
			$s = '%' . $request->input('search') .'%';
			$queryAircraft->where(function($queryAircraft) use ($s) {
				$queryAircraft->where('rego','like',$s);
				$queryAircraft->orWhere('manufacturer','like',$s);
				$queryAircraft->orWhere('model','like',$s);
				$queryAircraft->orWhere('owner','like',$s);
			});
		}


		switch ($request->input('type'))
		{
			case 'glider':
				$queryAircraft->where(function($queryAircraft) {
					$queryAircraft->where('class','=','Glider');
					$queryAircraft->orWhere('class','=','Power Glider');
					$queryAircraft->orWhere('class','=','Amateur Built Glider');
				});
				
				break;
			case 'plane':
			case 'aeroplane':
				$queryAircraft->where(function($queryAircraft) {
					$queryAircraft->where('class','=','Aeroplane');
					$queryAircraft->orWhere('class','=','Amateur Built Aeroplane');
				});
				break;
			case 'microlight':
				$queryAircraft->where(function($queryAircraft) {
					$queryAircraft->where('class','=','Microlight Class 1');
					$queryAircraft->orWhere('class','=','Microlight Class 2');
				});
				break;
			case 'gyrocopter':
			case 'gyroplane':
			case 'gyro':
				$queryAircraft->where('class','=','Gyroplane');
				break;
			case 'helicopter':
				$queryAircraft->where(function($queryAircraft) {
					$queryAircraft->where('class','=','Helicopter');
					$queryAircraft->orWhere('class','=','Amateur Built Helicopter');
				});
				break;
			case 'balloon':
				$queryAircraft->where('class','=','Balloon');
				break;
			case 'tow-plane':
			case 'tow':
			case 'tug':
				$queryAircraft->where('towplane','=','1');
				break;
			case 'self-launch':
			case 'self-launcher':
				$queryAircraft->where('self_launcher','=','1');
				break;
			case 'sustainer':
				$queryAircraft->where('sustainer','=','1');
				break;
			case 'engine':
				$queryAircraft->where(function($queryAircraft) {
					$queryAircraft->where('sustainer','=','1');
					$queryAircraft->orWhere('self_launcher','=','1');
				});
				break;
			case 'vintage':
				$queryAircraft->where('vintage','=','1');
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

		if ($aircraft = $queryAircraft->paginate($request->input('per-page', 50)))
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
		if ($aircraft = Aircraft::find($id))
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

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $rego
	 * @return \Illuminate\Http\Response
	 */
	public function rego($rego)
	{
		if ($aircraft = Aircraft::where('rego', $rego)->first())
		{
			return $this->success($aircraft);
		}
		return $this->error();
	}
}
