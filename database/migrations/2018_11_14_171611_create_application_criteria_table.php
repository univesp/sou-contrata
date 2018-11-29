<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCriteriaTable extends Migration {

    public function up() {

        Schema::create('application_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flag_ok');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('application_criteria');
    }
}
