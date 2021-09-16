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
            $table->unsignedInteger('HistHalaka')->index('HistHalaka');
            $table->unsignedInteger('ensEtudHlk_id')->index('ensEtudHlk_id');
            $table->integer('hizb');
            $table->string('surat', 50);
            $table->integer('aya_d');
            $table->integer('aya_f');
            $table->integer('mtn_name');
            $table->integer('mtn_num_d');
            $table->integer('mtn_num_f');
            $table->tinyInteger('absent');
            $table->string('justificatif', 500);
            $table->string('observations', 1000);
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
