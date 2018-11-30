<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipAreaScholarity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarities', function (Blueprint $table){
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarities', function (Blueprint $table){
            $table->dropForeign('scholarities_area_id_foreign');
            $table->dropColumn('area_id');
        });
    }
}
