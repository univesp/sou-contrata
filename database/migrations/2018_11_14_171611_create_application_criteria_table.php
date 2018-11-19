<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCriteriaTable extends Migration {

    public function up() {

        Schema::create('application_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flag_on');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->integer('vacancy_crit_id')->unsigned();
            $table->foreign('vacancy_crit_id')->references('id')->on('vacancy_criteria');
            $table->timestamps(); 
        });
    }

    public function down() {

        Schema::dropIfExists('application_criteria');
    }
}
