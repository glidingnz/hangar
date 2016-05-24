<?php

namespace App\Http\Controllers\Api;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
	protected $data;

	public function __construct()
	{
		$this->data['success']=false;
		$this->data['http_code']=500;
	}

	public function success($data, $paginated=false)
	{
		if ($paginated)
		{
			$item = $data->toArray();
			$data = $item['data'];
			unset($item['data']);
			$this->data = array_merge($this->data, $item);
		}
		$this->data['data'] = $data;
		$this->data['success']=true;
		$this->data['http_code']=200;
		return $this->data;
	}

	public function not_found()
	{
		$this->data['error']='Not Found';
		$this->data['success']=false;
		$this->data['http_code']=404;
		return $this->data;
	}

	public function bad_request($message="Bad Request")
	{
		$this->data['error']=$message;
		$this->data['success']=false;
		$this->data['http_code']=400;
		return $this->data;
	}

	public function error($message="An Unknown Error Occured")
	{
		$this->data['error']=$message;
		$this->data['success']=false;
		$this->data['http_code']=500;
		return $this->data;
	}

	public function fetch_user()
	{
		$user = Auth::user();
		if ($user==null)
		{
			// try OAuth user
			if ($userID = Authorizer::getResourceOwnerId())
			{
				// fetch the user
				$user = User::find($userID);
			}
		}
		return $user;
	}
}
