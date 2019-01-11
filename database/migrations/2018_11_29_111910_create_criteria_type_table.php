<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_type', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('criterion_type_id')->unsigned();
            $table->foreign('criterion_type_id')->references('id')->on('criterion_types');

            $table->Integer('criteria_id')->unsigned();
            $table->foreign('criteria_id')->references('id')->on('criteria');

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
        Schema::dropIfExists('criteria_type');
    }
}
