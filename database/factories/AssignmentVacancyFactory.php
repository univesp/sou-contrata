<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        
        'service_id' => $faker->numberBetween($min = 1, $max = 100),
        'criteria_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
