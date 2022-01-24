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
            $table->foreign('ensEtudHlk_id', 'histetudiante_ibfk_1')->references('id')->on('ensetudhlk');
            $table->foreign('HistHalaka_id', 'histetudiante_ibfk_2')->references('id')->on('histhalaka')->onDelete('cascade');
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
            $table->dropForeign('histetudiante_ibfk_1')->onDelete('cascade');
            $table->dropForeign('histetudiante_ibfk_2');
        });
    }
}
