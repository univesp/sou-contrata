<?php
use App\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function ($faker) use ($factory) {
    return [
        'status' => $faker->text($maxNbChars = 30), 
        'observation' => $faker->text($maxNbChars = 100), 
        'candidate_id' => $factory->create(App\Candidate::class)->id,
        'vacancy_id' => $factory->create(App\Vacancy::class)->id,
    ];
});
