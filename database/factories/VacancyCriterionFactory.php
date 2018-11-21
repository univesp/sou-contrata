<?php
use App\VacancyCriterion;
use App\Criterion;
use App\Vacancy;
use Faker\Generator as Faker;

$factory->define(VacancyCriterion::class, function ($faker) use ($factory) {
    return [
        'punctuation' => $faker->numberBetween(1,100)
    ];
});
