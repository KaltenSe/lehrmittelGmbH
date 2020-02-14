<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->bigIncrements('ArtikelId');
            $table->boolean('Aktiv');
            $table->string('Beschreibung');
            $table->bigInteger('Bestand');
            $table->integer('Lieferzeit');
            $table->string('Bild');
            $table->string('Name');
            $table->decimal('Preis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
