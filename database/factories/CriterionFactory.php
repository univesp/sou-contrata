<?php
use App\Criterion;
use Faker\Generator as Faker;

$factory->define(Criterion::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'subtitel' => $faker->title,
        'name' => $faker->name,
    ];
});
