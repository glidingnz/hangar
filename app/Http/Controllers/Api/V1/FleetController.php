<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\ApiController;
use App\Models\Fleet;
use App\Models\Org;

class FleetController extends ApiController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Org $org)
	{
		if ($fleet = Fleet::where('org_id', $org->id)->get())
		{
			return $this->success($fleet);
		}
		return $this->error();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Org $org)
	{
		/*
		if ($fleet = Fleet::where('org_id', $org->id)->get())
		{
			return $this->success($fleet);
		}
		return $this->error();
		*/
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
	public function show($org_id)
	{
		
		if ($fleet = Fleet::where('org_id', $org->id)->get())
		{
			return $this->success($fleet);
		}
		return $this->error();
		/*
		$queryAircraft = Aircraft::query();
		$queryAircraft->orderBy('rego');

		// check if we need to restrict to an organisation
		if ($org_id)
		{
			$queryAircraft->join('aircraft_org as ao','ao.aircraft_id', '=', 'aircraft.id');
			$queryAircraft->where('org_id', '=', $org_id);
			if ($aircraft = $queryAircraft->get())
			{
				return $this->success($aircraft, TRUE);
			}
		}
		*/
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
