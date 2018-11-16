<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    //name	login	password	email	cod_privilege

    return [
        'name' => $faker->name,
        'login' => $faker->name,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'cod_privilege' => $faker->numberBetween($min = 1, $max = 4),
        'remember_token' => str_random(10),
        'cod_privilege' => rand(0,2),
    ];
});
