<?php
use App\VacancyCriterion;
use App\Criterion;
use App\Vacancy;
use Faker\Generator as Faker;

$factory->define(VacancyCriterion::class, function (Faker $faker) {
    return [
        'criterion_id' => function () {
            return factory(Criterion::class)->create()->id;
        },
        'vacancy_id' =>  function () {
            return factory(Vacancy::class)->create()->id;
        },
        'punctuation' => $faker->numberBetween(1,100)
    ];
});
