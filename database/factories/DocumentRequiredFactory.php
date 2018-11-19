<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function ($faker) use ($factory) {
    return [
        'candidate_id' => $factory->create(App\Candidate::class)->id,
        'document' => $faker->title,
    ];
});
