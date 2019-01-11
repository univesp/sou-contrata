<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipCriteriaVacancyCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancy_criteria', function (Blueprint $table){
            $table->integer('criterion_id')->unsigned();
            $table->foreign('criterion_id')->references('id')->on('criteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancy_criteria', function (Blueprint $table){
            $table->dropForeign('vacancy_criteria_criterion_id_foreign');
            $table->dropColumn('criterion_id');
        });
    }
}
