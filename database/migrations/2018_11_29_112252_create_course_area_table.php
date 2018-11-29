<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_area', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->Integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');

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
        Schema::dropIfExists('course_area');
    }
}
