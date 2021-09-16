<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('niveauAhkam', 100)->nullable();
            $table->string('lieuKhatm', 100)->nullable();
            $table->date('dateKhatm')->nullable();
            $table->string('ensKhatm', 100)->nullable();
            $table->string('teach', 10)->nullable();
            $table->string('teachPlace', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiante');
    }
}
