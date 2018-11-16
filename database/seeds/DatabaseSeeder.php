<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {

        $this->call(UsersTableSeeder::class);
        $this->call(CriteriaTableSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(EdictsTableSeeder::class);
        $this->call(VacanciesTableSeeder::class);
        $this->call(VacancyCriteriaTableSeeder::class);

        // $this->call(CandidatesTableSeeder::class);
        // $this->call(AssignmentTableSeeder::class);
        // $this->call(ApplicationsTableSeeder::class);
        // $this->call(ApplicationCriteriaTableSeeder::class);
        // $this->call(ApplicationAssignmentSeeder::class);
        // $this->call(ScholarityTableSeeder::class);

    }
}
