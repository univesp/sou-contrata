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
            $table->unsignedInteger('edict_id');

            $table->string('title', 150);
            $table->decimal('payload',5);
            $table->string('phone',12);
            $table->string('postal_code',9);
            $table->string('matter',40);

            $table->foreign('edict_id')->references('id')->on('edicts');

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