<?php

use Faker\Generator as Faker;

$factory->define(\App\VacancyCriterion::class, function (Faker $faker) {
    return [
        'criterion_id' =>1,
        'vacancy_id' => 1,
        'punctuation' => $faker->numberBetween(1,100)
    ];
});
