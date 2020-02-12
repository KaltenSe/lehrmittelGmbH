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
        Schema::create('benutzer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Loginname')->unique();
            $table->string('Adresse');
            $table->string('PLZ');
            $table->string('Gutschrift')->default(null)->nullable();
            $table->string('Rolle')->default('user');
            $table->string('Email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('PasswortHash');
            #$table->rememberToken();
            $table->string('token', 100)->nullable();
            #$table->timestamps();
            $table->timestamp('Erstellt');
            $table->timestamp('Aktualisiert');
            $table->unique(['Vorname', 'Nachname']);
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
