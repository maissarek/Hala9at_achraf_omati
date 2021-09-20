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
            $table->tinyInteger('khatima');
            $table->string('lieuKhatm', 100)->nullable();
            $table->date('dateKhatm')->nullable();
            $table->string('ensKhatm', 100)->nullable();
            $table->tinyInteger('teach')->nullable();
            $table->string('teachPlace', 100)->nullable();
            $table->unsignedInteger('personne_id')->index('personne_id');
            $table->string('hizb', 100);
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
        Schema::dropIfExists('etudiante');
    }
}
