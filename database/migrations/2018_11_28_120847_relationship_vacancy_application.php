<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipVacancyApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table){
            $table->integer('vacancy_id')->unsigned();
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table){
            $table->dropForeign('applications_vacancy_id_foreign');
            $table->dropColumn('vacancy_id');
        });
    }
}
