<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {
    
    public function up() {

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsined();
            $table->string('document_type', 20);
            $table->string('number',50);
            $table->string('number_serie',10);
            $table->date('date_emission');
            $table->timestamps();
        });
    }
    
    public function down() {

        Schema::dropIfExists('documents');
    }
}
