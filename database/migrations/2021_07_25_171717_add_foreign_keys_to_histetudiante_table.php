<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHistetudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histetudiante', function (Blueprint $table) {
            $table->foreign('HistHalaka', 'histetudiante_ibfk_1')->references('id')->on('histhalaka');
            $table->foreign('ensEtudHlk_id', 'histetudiante_ibfk_2')->references('id')->on('ensetudhlk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histetudiante', function (Blueprint $table) {
            $table->dropForeign('histetudiante_ibfk_1');
            $table->dropForeign('histetudiante_ibfk_2');
        });
    }
}
