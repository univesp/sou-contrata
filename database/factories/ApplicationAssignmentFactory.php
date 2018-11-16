<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'flag_on' => $faker->numberBetween($min = 0, $max = 1), 
    ];
});
