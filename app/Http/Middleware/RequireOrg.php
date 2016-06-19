<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Org;
use App\Facades\Messages;

class RequireOrg
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$subdomains = explode(".",$_SERVER['HTTP_HOST']);
		$subdomain = array_shift($subdomains);
		
		if ($org = Org::where('slug', $subdomain)->first())
		{
			$request->attributes->add(['org' => $org]);
			return $next($request);
		}
		// if no site is found, return to the switch page
		return redirect('/clubs');

		//$temp_errors[] = 'Doing it wrong';
		//$request->session()->flash('errors', $temp_errors);
	}
}
