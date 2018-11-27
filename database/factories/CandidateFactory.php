<?php
use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function ($faker) use ($factory)
{

    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'date_birth' => date("Y-m-d H:i:s",strtotime("-10950 day",strtotime("now"))),
        'genre' => array_rand(array('F','M'), 1),
        'curriculum_link' => __DIR__ . '/public/img/curriculum/123456789.pdf',
        'marital_status' => array_rand(array('Casado','Solteiro','Viuvo','Disquitado'), 1),
        'cpf' => $faker->numerify('#########-##'),
        'file_cpf' =>  __DIR__ . '/public/img/cpf/arquivo.pdf',
        // 'cell_phone' => $faker->numerify('## #####-####'),
        'flag_deficient' => $faker->numberBetween($min = 0, $max = 1),
        'obs_deficient' => $faker->text(100),
        'name_mother' => $faker->name,
        'name_father' => $faker->name,
        'name_social' => $faker->name,
        'nationality' => $faker->country,
        'phone' => $faker->numerify('## #####-####'),
        'user_id' => $factory->create(App\User::class)->id,
    ];
});
