<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name', 150);
            $table->date('end_date');
            $table->date('init_date');
            $table->text('link');
            $table->char('scholarity_type', 20);
            $table->string('teaching_institution', 150);
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
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
        Schema::dropIfExists('scholarities');
    }
}
