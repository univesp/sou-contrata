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
            $table->integer('candidate_id')->unsigned()->index();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->string('elector_title')->nullable();
            $table->text('elector_link')->nullable();
            $table->string('military_certificate')->nullable();
            $table->text('military_link')->nullable();
            $table->string('number', 50);
            $table->text('number_link');
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
