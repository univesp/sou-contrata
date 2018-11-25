<?php
use App\ApplicationDocument;
use Faker\Generator as Faker;

$factory->define(ApplicationDocument::class, function (Faker $faker) {
    return [
        'flag_on' => $faker->numberBetween($min = 0, $max = 1), 
        'candidate_id' => $faker->numberBetween($min = 1, $max = 100),
        'document_required_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
