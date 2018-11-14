<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_assignments', function (Blueprint $table) {
           
            $table->increments('application_id')->unsined();
            $table->integer('service_id')->unsined();
            $table->tinyint('flag_ok');
            
            $table->foreign('application_id')->references('id')->on('application');
            $table->foreign('service_id')->references('id')->on('service');

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
        Schema::dropIfExists('application_assignments');
    }
}
