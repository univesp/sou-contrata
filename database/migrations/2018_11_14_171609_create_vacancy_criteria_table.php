<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('criterion_id');
            $table->unsignedInteger('vacancy_id');
            $table->integer('punctuation');

            $table->foreign('criterion_id')->references('id')->on('criteria');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancy_criteria');
    }
}
