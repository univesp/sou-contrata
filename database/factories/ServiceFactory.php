<?php
use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50), 
        'description' => $faker->text(400),
    ];
});
