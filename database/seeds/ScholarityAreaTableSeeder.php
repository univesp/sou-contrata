<?php

use Illuminate\Database\Seeder;

class ScholarityAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ScholarityArea::class, 10)->create();
    }
}
