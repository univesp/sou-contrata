<?php
use App\Area;
use Faker\Generator as Faker;

$factory->define(Area::Class, function (Faker $faker) {
    return [
        'description' => $faker->text(50),
    ];
});