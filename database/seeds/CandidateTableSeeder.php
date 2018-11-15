<?php

use Illuminate\Database\Seeder;

class CandidateTableSeeder extends Seeder {
    
    public function run() {
        
        factory(\App\Candidate::class, 100)->make();
    }
}
