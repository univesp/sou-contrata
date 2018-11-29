<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipDocumentRequiredDocumentApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_documents', function (Blueprint $table){
            $table->integer('document_required_id')->unsigned();
            $table->foreign('document_required_id')->references('id')->on('document_requireds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_documents', function (Blueprint $table){
            $table->dropForeign('application_documents_document_required_id_foreign');
            $table->dropColumn('document_required_id');
        });
    }
}
