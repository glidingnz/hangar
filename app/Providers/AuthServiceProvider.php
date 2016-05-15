<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
	 * @return void
	 */
	public function boot(GateContract $gate)
	{
		$this->registerPolicies($gate);

		$gate->define('root', function ($user) {
			return true;
		});
		$gate->define('admin', function ($user) {
			return true;
		});
		$gate->define('editor', function ($user) {
			return true;
		});
		$gate->define('viewer', function ($user) {
			return true;
		});
	}
}
