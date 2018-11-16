<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder {
    
    public function run() {

        factory(App\Document::class, 100)->create();
    }
}
