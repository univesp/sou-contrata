<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {

        $this->call(UsersTableSeeder::class);
        $this->call(CandidateTableSeeder::class);
        // $this->call(CriteriaTableSeeder::class);
        // $this->call(ServiceTableSeeder::class);
        // $this->call(AssignmentVacancyTableSeeder::class);
        // $this->call(DocumentRequiredTableSeeder::class);
        // $this->call(EdictsTableSeeder::class);
        // $this->call(VacanciesTableSeeder::class);
        // $this->call(ApplicationsTableSeeder::class);
        // $this->call(VacancyCriteriaTableSeeder::class);
        // $this->call(ApplicationCriteriaTableSeeder::class);
        // $this->call(ApplicationAssignmentTableSeeder::class);
        // $this->call(ScholarityTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);

    }
}
