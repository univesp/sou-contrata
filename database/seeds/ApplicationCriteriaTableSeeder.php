<?php

use Illuminate\Database\Seeder;

class ApplicationCriterionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ApplicationCriterion::class, 100)->make();
    }
}
