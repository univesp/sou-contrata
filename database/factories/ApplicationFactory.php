<?php
use App\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function ($faker) use ($factory) {
    return [
        'status' => $faker->text($maxNbChars = 30), 
        'observation' => $faker->text($maxNbChars = 100),
        'candidate_id' => $faker->numberBetween(1,100),
        'vacancy_id' => $faker->numberBetween(1,100),
    ];
});
