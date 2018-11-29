<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseDisciplineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_discipline', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('discipline_id')->unsigned();
            $table->foreign('discipline_id')->references('id')->on('disciplines');

            $table->Integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('course_discipline');
    }
}
