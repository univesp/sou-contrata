<?php

use Illuminate\Database\Seeder;

class ScholarityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Scholarity::class, 100)->create();
    }
}
