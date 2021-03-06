<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
	return [
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'email' => $faker->safeEmail,
		'password' => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
		'activation_code' => str_random(12),
		'api_token' => str_random(60),
		'mobile' => $faker->numerify('021 ### ####'),
		'user_level' => '255'
	];
});
