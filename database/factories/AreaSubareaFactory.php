<?php
use App\AreaSubarea;
use Faker\Generator as Faker;

$factory->define(AreaSubarea::class, function ($faker) use ($factory) {
    return [
        'area_id' => $factory->create(App\Area::class)->id,
        'subarea_id' => $factory->create(App\Subarea::class)->id,
    ];
});