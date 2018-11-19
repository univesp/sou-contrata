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
            $table->integer('service_id')->unsigned()->unique();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('criterion_id')->unsigned()->unique();
            $table->foreign('criterion_id')->references('id')->on('criteria')->onDelete('cascade');

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
