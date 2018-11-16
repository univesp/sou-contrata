<?php
use App\Edict;
use Faker\Generator as Faker;

$factory->define(Edict::class, function (Faker $faker) {
    return [
        'edict_link' => $faker->link,
        'date_start' => $faker->date('d-m-Y'),
        'date_end' => date('d-m-Y'),
    ];
});


