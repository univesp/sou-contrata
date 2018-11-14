<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApplicationsTableSeeder::class);
        $this->call(ApplicationCriterionsTableSeeder::class);
        $this->call(ApplicationDocumentsTableSeeder::class);
        $this->call(VacanciesTableSeeder::class);
        $this->call(CriteriaTableSeeder::class);
        $this->call(VacancyCriteriaTableSeeder::class);
    }
}
