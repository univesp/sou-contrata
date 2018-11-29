<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipTitleCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criteria', function (Blueprint $table){
            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')->references('id')->on('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('criteria', function (Blueprint $table){
            $table->dropForeign('criteria_title_id_foreign');
            $table->dropColumn('title_id');
        });
    }
}
