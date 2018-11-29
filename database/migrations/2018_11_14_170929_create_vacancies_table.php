<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->decimal('payload',5);
            $table->string('phone',30);
            $table->string('postal_code',15);
            $table->string('matter',100);
            //$table->string('offer',40);
            //$table->string('type',40);
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
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
        Schema::dropIfExists('vacancies');
    }
}
