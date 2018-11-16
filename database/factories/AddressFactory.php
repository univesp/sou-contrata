<?php
use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'public_place'=> $faker->streetSuffix,
        'type_public_place'=> $faker->streetSuffix,
        'number'=> $faker->numerify('#####'),
        'postal_code'=> $faker->numerify('###-####'),
        'complement'=> $faker->numerify('#####'),
        'city'=> $faker->city,
        'state' => $faker->city,
    ];
});
