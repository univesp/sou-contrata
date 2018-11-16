<?php
use App\VacancyCriterion;
use App\Criterion;
use App\Vacancy;
use Faker\Generator as Faker;

$factory->define(VacancyCriterion::class, function (Faker $faker) {
    return [
        'criterion_id' => $faker->numberBetween(1,100),
        'vacancy_id' => $faker->numberBetween(1,100),
        'punctuation' => $faker->numberBetween(1,100)
    ];
});
