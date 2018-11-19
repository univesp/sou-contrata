<?php
use App\VacancyCriterion;
use App\Criterion;
use App\Vacancy;
use Faker\Generator as Faker;

$factory->define(VacancyCriterion::class, function ($faker) use ($factory) {
    return [
        'criterion_id' => $factory->create(App\Criterion::class)->id,
        'vacancy_id' => $factory->create(App\Vacancy::class)->id,
        'punctuation' => $faker->numberBetween(1,100)
    ];
});
