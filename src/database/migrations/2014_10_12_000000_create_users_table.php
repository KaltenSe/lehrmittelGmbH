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
            $table->bigIncrements('Id');
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Loginname')->unique();
            $table->string('Adresse');
            $table->string('PLZ');
            $table->decimal('Gutschrift')->default(null)->nullable();
            $table->string('RollenId')->default(0);
            $table->string('Email')->unique();
            $table->string('Passwort');
            $table->timestamp('Erstellt');
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
