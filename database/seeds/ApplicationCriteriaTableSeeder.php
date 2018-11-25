<?php

use Illuminate\Database\Seeder;

class ApplicationCriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ApplicationCriterion::class, 100)->create();
    }
}
