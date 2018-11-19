<?php
use App\ApplicationAssignment;
use Faker\Generator as Faker;

$factory->define(ApplicationAssignment::class, function ($faker) use ($factory) {
    return [
        'flag_ok' => $faker->numberBetween($min = 0, $max = 1), 
        'application_id' => $factory->create(App\Application::class)->id,
        'service_id' => $factory->create(App\Service::class)->id,
    ];
});
