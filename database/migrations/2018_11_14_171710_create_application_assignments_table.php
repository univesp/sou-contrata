<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationAssignmentsTable extends Migration {
    
    public function up() {

        Schema::create('application_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->tinyInteger('flag_ok');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');

            $table->timestamps(); 
        });
    }

    public function down() {

        Schema::dropIfExists('application_assignments');
    }
}
