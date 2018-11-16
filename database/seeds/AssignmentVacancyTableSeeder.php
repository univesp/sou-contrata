<?php

use Illuminate\Database\Seeder;

class AssignmentVacancyTableSeeder extends Seeder {
  
    public function run() {
        
        factory(\App\AssignmentVacancy::class, 100)->create();
    }
}
