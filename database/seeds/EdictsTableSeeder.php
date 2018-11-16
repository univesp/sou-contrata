<?php

use Illuminate\Database\Seeder;

class EdictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Edict::class, 100)->create();
    }
}
