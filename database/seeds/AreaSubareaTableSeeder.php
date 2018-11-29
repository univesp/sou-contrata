<?php

use Illuminate\Database\Seeder;

class AreaSubareaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AreaSubarea::class, 10)->create();
    }
}
