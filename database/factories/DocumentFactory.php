<?php
use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'type'=> $faker->name,
        'number'=> $faker->numerify('#####'),
        'serie_number'=> $faker->numerify('#####'),
        'zone'=> $faker->numerify('#####'),
        'uf_emission'=> 'SP',
        'section'=> $faker->numerify('#####'),
        'emission_date'=> date("Y-m-d H:i:s",strtotime("-120 day",strtotime("now"))),
        'link' => __DIR__ . '/public/img/document/123456789.pdf',
    ];
});
