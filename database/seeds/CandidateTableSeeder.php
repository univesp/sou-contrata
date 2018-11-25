<?php

use Illuminate\Database\Seeder;
use App\User;

class CandidateTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Candidate::class, 100)->create();
    }
}
