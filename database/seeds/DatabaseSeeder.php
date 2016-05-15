<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$env = getenv('APP_ENV');
		Model::unguard();


		// local enviroment only ------------------
		if ($env=='local')
		{
			User::truncate();
			
			factory(App\Models\User::Class, 50)->create();

			// set user 1 to have a set password
			$user = App\Models\User::first();
			$user->email='test@pear.co.nz';
			$user->password=bcrypt('test');
			$user->activated=1;
			$user->save();
		}
		
		// Local and DEV environment ---------------
		$this->call(OrgsTableSeeder::class);


		Model::reguard();
	}
}
