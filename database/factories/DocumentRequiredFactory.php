<?php
use App\DocumentRequired;
use Faker\Generator as Faker;

$factory->define(DocumentRequired::class, function ($faker) use ($factory) {
    return [
        'candidate_id' => $factory->create(App\Candidate::class)->id,
        'document' => $faker->title,
    ];
});
