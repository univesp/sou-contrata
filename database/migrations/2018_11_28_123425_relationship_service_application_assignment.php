<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipServiceApplicationAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_assignments', function (Blueprint $table){
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_assignments', function (Blueprint $table){
            $table->dropForeign('application_assignments_service_id_foreign');
            $table->dropColumn('service_id');
        });
    }
}
