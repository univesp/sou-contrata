<?php

use Illuminate\Database\Seeder;

class ApplicationDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ApplicationDocument::class, 100)->create();
    }
}
