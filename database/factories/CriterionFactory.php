<?php

use Faker\Generator as Faker;

$factory->define(\App\Criterion::class, function (Faker $faker) {
    return [
        'criterion_id' => '',
        'title' => $faker->title
    ];
});
