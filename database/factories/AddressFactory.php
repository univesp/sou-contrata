<?php
use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'file_address' => __DIR__ . '/public/img/address/arquivo.pdf',
        'public_place'=> $faker->streetSuffix,
        'type_public_place'=> $faker->streetSuffix,
        'neighborhood'=> $faker->streetName,
        'number'=> $faker->numerify('#####'),
        'postal_code'=> $faker->numerify('###-####'),
        'complement'=> $faker->numerify('#####'),
        'city'=> $faker->city,
        'state' => $faker->city,
    ];
});
