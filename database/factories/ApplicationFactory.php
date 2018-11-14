<?php

use App\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [
        'status' => $faker->text($maxNbChars = 50), 
        'observation' => $faker->text($maxNbChars = 100), 
        'candidate_id' => $faker->numberBetween($min = 1, $max = 100),
        'criterion_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
