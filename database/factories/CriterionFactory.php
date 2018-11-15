<?php
use App\Criterion;
use Faker\Generator as Faker;

$factory->define(Criterion::class, function (Faker $faker) {
    return [
        'criterion_id' => '',
        'title' => $faker->title
    ];
});
