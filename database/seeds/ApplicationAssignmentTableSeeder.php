<?php

use Illuminate\Database\Seeder;

class ApplicationAssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ApplicationAssignment::class, 100)->create();
    }
}
