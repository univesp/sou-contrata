<?php
use App\Vacancy;
use App\Edict;
use Faker\Generator as Faker;

$factory->define(Vacancy::class, function (Faker $faker) {
    return [
        'edict_id' => $faker->numberBetween(1,100),
        'title' => $faker->title,
        'payload' => $faker->numberBetween(20,60),
        'phone' => $faker->phoneNumber,
        'postal_code' => $faker->postcode,
        'matter' => $faker->text(40),

    ];
});

