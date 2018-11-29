<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipEdictVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table){
            $table->integer('edict_id')->unsigned();
            $table->foreign('edict_id')->references('id')->on('edicts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table){
            $table->dropForeign('vacancies_edict_id_foreign');
            $table->dropColumn('edict_id');
        });
    }
}
