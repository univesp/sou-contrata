<?php

use Illuminate\Database\Seeder;

class DocumentRequiredTableSeeder extends Seeder {

    
    public function run() {

        factory(App\DocumentRequired::class, 100)->create();
    }
}
