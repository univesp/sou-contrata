<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipVacancyCriteriaApplicationCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_criteria', function (Blueprint $table){
            $table->integer('vacancy_crit_id')->unsigned();
            $table->foreign('vacancy_crit_id')->references('id')->on('vacancy_criteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_criteria', function (Blueprint $table){
            $table->dropForeign('application_criteria_vacancy_crit_id_foreign');
            $table->dropColumn('vacancy_crit_id');
        });
    }
}
