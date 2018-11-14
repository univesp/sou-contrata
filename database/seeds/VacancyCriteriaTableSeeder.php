<?php

use Illuminate\Database\Seeder;

class VacancyCriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\VacancyCriterion::class, 100)->create();
    }
}
