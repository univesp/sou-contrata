<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceVacanciesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('service_vacancies', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');

            $table->Integer('vacancy_id')->unsigned();
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
        Schema::dropIfExists('service_vacancies');
    }
}
