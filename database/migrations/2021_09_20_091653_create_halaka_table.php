<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaka', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('lieu', 500);
            $table->string('jour', 100);
            $table->time('tempsDebut');
            $table->time('tempsFin');
            $table->string('fiaMin', 100);
            $table->string('fiaMax', 100);
            $table->unsignedInteger('id_groupe')->index('id_groupe');
            $table->unsignedInteger('id_lieu')->index('id_lieu');
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
        Schema::dropIfExists('halaka');
    }
}
