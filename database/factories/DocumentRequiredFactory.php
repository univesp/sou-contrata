<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'candidate_id' => $faker->numberBetween(1, 100),
        'document' => $faker->title,
    ];
});
