<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Adresse');
            $table->string('Email')->unique();
            $table->string('password');
            $table->string('Gutschrift');
            $table->string('LoginName');
            $table->string('Nachname');
            $table->string('PasswortHash');
            $table->string('PLZ');
            $table->string('Rolle');
            $table->string('Vorname');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
