<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationAssignmentsTable extends Migration {

    public function up() {

        Schema::create('application_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flag_ok');
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('application_assignments');
    }
}
