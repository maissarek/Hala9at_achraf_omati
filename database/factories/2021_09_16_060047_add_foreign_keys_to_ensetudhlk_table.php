<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEnsetudhlkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ensetudhlk', function (Blueprint $table) {
            $table->foreign('id_ens', 'ensetudhlk_ibfk_1')->references('id')->on('enseigante');
            $table->foreign('id_etud', 'ensetudhlk_ibfk_2')->references('id')->on('etudiante');
            $table->foreign('id_hlk', 'ensetudhlk_ibfk_3')->references('id')->on('halaka');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ensetudhlk', function (Blueprint $table) {
            $table->dropForeign('ensetudhlk_ibfk_1');
            $table->dropForeign('ensetudhlk_ibfk_2');
            $table->dropForeign('ensetudhlk_ibfk_3');
        });
    }
}
