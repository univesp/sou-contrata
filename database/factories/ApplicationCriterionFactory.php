<?php
use App\ApplicationCriterion;
use Faker\Generator as Faker;

$factory->define(ApplicationCriterion::class, function (Faker $faker) {
    return [
        'flag_on' => $faker->numberBetween($min = 0, $max = 1), 
        'candidate_id' => $faker->numberBetween($min = 1, $max = 100),
        'vacancy_crit_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
