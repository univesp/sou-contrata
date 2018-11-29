<?php

use Illuminate\Database\Seeder;

class SubAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subarea::class, 10)->create();
    }
}
