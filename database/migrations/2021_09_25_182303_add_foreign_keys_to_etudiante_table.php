<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEtudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etudiante', function (Blueprint $table) {
            $table->foreign('personne_id', 'etudiante_ibfk_1')->references('id')->on('personne');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiante', function (Blueprint $table) {
            $table->dropForeign('etudiante_ibfk_1');
        });
    }
}
