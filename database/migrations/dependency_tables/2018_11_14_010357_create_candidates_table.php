<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {
    
    public function up() {

        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('last_name', 100);
            $table->date('date_birth');
            $table->char('genre',1);
            $table->string('curriculum_link', 150);
            $table->char('marital_status',20);
            $table->char('cpf',11);
            $table->string('cell_phone',20);
            $table->tinyInteger('flag_deficient');
            $table->text('obs_deficient');
            $table->string('name_mather',150);
            $table->string('name_father',150);
            $table->string('name_social',150);
            $table->string('nationality',20);
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('candidates');
    }
}