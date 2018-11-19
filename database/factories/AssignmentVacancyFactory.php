<?php
use App\AssignmentVacancy;
use Faker\Generator as Faker;

$factory->define(AssignmentVacancy::class, function ($faker) use ($factory) {
    return [
        
        'service_id' => $factory->create(App\Service::class)->id,
        'criterion_id' => $factory->create(App\Criterion::class)->id,
    ];
});