<?php
<<<<<<< HEAD
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
=======

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
>>>>>>> 33387759b19e48d2dc9ab7a4c340d9c58a6c4aa5
    ];
});
