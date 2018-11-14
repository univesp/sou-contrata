<?php

use Faker\Generator as Faker;

$factory->define(\App\Vacancy::class, function (Faker $faker) {
    return [
        'edict_id' => 1,
        'title' => $faker->title,
        'payload' => $faker->numberBetween(20,60),
        'phone' => $faker->phoneNumber,
        'postal_code' => $faker->postcode,
        'matter' => $faker->text(40),

    ];
});

