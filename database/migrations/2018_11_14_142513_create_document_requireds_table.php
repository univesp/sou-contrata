<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentRequiredsTable extends Migration {

    public function up() {
        Schema::create('document_requireds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document', 150);
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('document_requireds');
    }
}
