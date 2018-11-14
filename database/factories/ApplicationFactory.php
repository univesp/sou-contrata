<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'status' => $faker->ext($maxNbChars = 50), 
        'observation' => $faker->ext($maxNbChars = 100), 
        'candidate_id' => $faker->numberBetween($min = 1, $max = 100),
        'criterion_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
