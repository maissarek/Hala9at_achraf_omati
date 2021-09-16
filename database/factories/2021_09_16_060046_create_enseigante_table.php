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
            $table->string('lieuKhatm', 100);
            $table->date('dateKhatm');
            $table->string('ensKhatm', 100);
            $table->string('Remplace', 100);
            $table->date('Rempl_day');
            $table->unsignedInteger('personne_id')->index('personne_id');
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
