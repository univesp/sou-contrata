<?php
use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function ($faker) use ($factory) {
    return [
        'document_type'=> $faker->text($maxNbChars = 20),
        'number'=> $faker->numerify('#####'),
        'serie_number'=> $faker->numerify('#####'),
        'date_issue'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'uf_issue'=> 'SP',
        'zone'=> $faker->numerify('#####'),
        'section'=> $faker->numerify('#####'),
        'candidate_id' => $factory->create(App\Candidate::class)->id,
    ];
});
