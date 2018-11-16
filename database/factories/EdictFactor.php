<?php
use App\Edict;
use Faker\Generator as Faker;

$factory->define(Edict::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        'edict_link' => $faker->link,
        'date_start' => $faker->date('d-m-Y'),
        'date_end'   => $faker->date('d-m-Y'),
=======
        'edict_link' => __DIR__ . '/public/img/edict/arquivo.pdf',
        'date_start' => date("Y-m-d H:i:s",strtotime("-30 day",strtotime("now"))),
        'date_end' => date("Y-m-d H:i:s",strtotime("+30 day",strtotime("now")))
>>>>>>> be7c44b63bc6a712b7a8883d6c555e1848619271
    ];
});


