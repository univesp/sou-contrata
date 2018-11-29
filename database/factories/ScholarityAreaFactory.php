<?php
use App\ScholarityArea;
use Faker\Generator as Faker;

$factory->define(ScholarityArea::class, function ($faker) use ($factory) {
    return [
        'area_id' => $factory->create(App\Area::class)->id,
        'scholarity_id' => $factory->create(App\Scholarity::class)->id
    ];
});
