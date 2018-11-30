<?php
use App\Subarea;
use Faker\Generator as Faker;

$factory->define(Subarea::class, function (Faker $faker) {
    return [
        'description' => $faker->text(85),
    ];
});