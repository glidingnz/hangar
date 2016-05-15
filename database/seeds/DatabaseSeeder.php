<?php
use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

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
        // $this->call(UsersTableSeeder::class);

    	User::truncate();
    	
    	factory(App\Models\User::Class, 50)->create();

        $user = App\Models\User::first();
        $user->email='test@pear.co.nz';
        $user->password=bcrypt('test');
        $user->activated=1;
        $user->save();

    }
}
