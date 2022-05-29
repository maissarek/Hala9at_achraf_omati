<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseiganteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseigante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('experienceTeaching', 100);
            $table->string('lieuKhatm', 100)->nullable();
            $table->date('dateKhatm')->nullable();
            $table->string('ensKhatm', 100)->nullable();
            $table->tinyInteger('Remplace')->nullable();
            $table->date('dateDebut');
            $table->unsignedInteger('personne_id')->index('personne_id');
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
        Schema::dropIfExists('enseigante');
    }
}
