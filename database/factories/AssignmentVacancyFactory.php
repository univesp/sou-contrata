<?php
use App\AssignmentVacancy;
use Faker\Generator as Faker;

$factory->define(AssignmentVacancy::class, function (Faker $faker) {
    return [
        
        'service_id' => $faker->numberBetween($min = 1, $max = 100),
        'criterion_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
