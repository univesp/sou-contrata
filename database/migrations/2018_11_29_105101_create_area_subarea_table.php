<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaSubareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_subarea', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');

            $table->Integer('subarea_id')->unsigned();
            $table->foreign('subarea_id')->references('id')->on('subareas');

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
        Schema::dropIfExists('area_subarea');
    }
}
