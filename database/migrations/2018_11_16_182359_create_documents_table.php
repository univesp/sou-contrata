<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{

    public function up()
    {

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('elector_title');
            //$table->text('elector_link');
            //$table->string('military_certificate')->nullable();
            //$table->text('military_link')->nullable();
            $table->string('number', 50);
            $table->text('link');
            $table->date('date_issue');
            $table->string('uf_issue', 20);
            $table->string('zone', 6);
            $table->string('section', 6);
            // $table->string('document_type', 20);
            // $table->string('serie_number', 10);
            $table->timestamps();
        });
    }

    public function down()
    {

        Schema::dropIfExists('documents');
    }
}
