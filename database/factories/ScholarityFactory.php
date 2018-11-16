<?php
use Carbon\Carbon;
use App\Scholarity;
use Faker\Generator as Faker;

$factory->define(Scholarity::class, function (Faker $faker) {
    return [
        'class_name' => $faker->text($maxNbChars = 150),
        'end_date' => Carbon::now()->addYears(5),
        'init_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'link' => $faker->url,
        'scholarity_type' => $faker->text($maxNbChars = 150),
        'teaching_institution' => $faker->numberBetween($min = 1, $max = 4),
        'candidate_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
