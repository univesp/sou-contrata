<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up() {

        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 100);
            $table->string('login', 40);
            $table->string('password',255);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('cod_privilege', 3);
            $table->timestamps();
        });
    }

    public function down() {

        Schema::dropIfExists('users');
    }
}
