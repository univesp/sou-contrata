<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentVacanciesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('assignment_vacancies', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('service_id');
            $table->unsignedInteger('vacancy_id');

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('assignment_vacancies');
    }
}
