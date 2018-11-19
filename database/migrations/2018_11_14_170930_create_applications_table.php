<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

    public function up() {

        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 30);
            $table->text('observation', 100);
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->integer('vacancy_id')->unsigned();
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->timestamps();
        });
    }

    public function down(){
        
        Schema::dropIfExists('applications');
    }
}
