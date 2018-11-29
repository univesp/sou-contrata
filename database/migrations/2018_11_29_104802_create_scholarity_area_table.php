<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarityAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarity_area', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');

            $table->Integer('scholarity_id')->unsigned();
            $table->foreign('scholarity_id')->references('id')->on('scholarities');

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
        Schema::dropIfExists('scholarity_area');
    }
}
