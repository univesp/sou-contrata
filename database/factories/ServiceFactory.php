<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50), 
        'description' => $faker->text(400),
    ];
});
