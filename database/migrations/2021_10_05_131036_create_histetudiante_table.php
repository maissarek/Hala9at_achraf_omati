<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistetudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histetudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('HistHalaka_id')->index('HistHalaka');
            $table->unsignedInteger('ensEtudHlk_id')->index('ensEtudHlk_id');
            $table->integer('hizb');
            $table->string('el7ifd', 50);
            $table->string('Elmoraja3a', 500);
            $table->string('Elmtn', 500);
            $table->tinyInteger('retard')->nullable();
            $table->tinyInteger('absent');
            $table->string('justificatif', 500);
            $table->string('observations', 1000);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histetudiante');
    }
}
