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
            $table->string('elhifd', 50);
            $table->string('Elmorajaa', 500)->nullable();
            $table->string('Elmtn', 500)->nullable();
            $table->tinyInteger('retard')->nullable();
            $table->tinyInteger('absent')->nullable();
            $table->string('justificatif', 500)->nullable();
            $table->string('observations', 1000)->nullable();
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
