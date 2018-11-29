<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipCandidateScholarity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarities', function (Blueprint $table){
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
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
            $table->dropForeign('scholarities_candidate_id_foreign');
            $table->dropColumn('candidate_id');
        });
    }
}
