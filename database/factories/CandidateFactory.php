<?php
use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'last_name' => $faker->last_name,
        'date_birth' => $faker->date_birth,
        'genre' => $faker->genre,
        'curriculum_link' => $faker->curriculum_link,
        'marital_status' => $faker->marital_status,
        'cpf' => $faker->cpf,
        'cell_phone' => $faker->cell_phone,
        'flag_deficient' => $faker->numberBetween($min = 0, $max = 1),
        'obs_deficient' => $faker->obs_deficient,
        'name_mather' => $faker->name,
        'name_father' => $faker->name,
        'name_social' => $faker->name,
        'nationality' => $faker->country,
        'user_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
