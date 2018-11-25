<?php
use App\Edict;
use Faker\Generator as Faker;

$factory->define(Edict::class, function (Faker $faker) {
    return [

        'edict_link' => __DIR__ . '/public/img/edict/arquivo.pdf',
        'date_start' => date("Y-m-d H:i:s",strtotime("-30 day",strtotime("now"))),
        'date_end' => date("Y-m-d H:i:s",strtotime("+30 day",strtotime("now")))
    ];
});


