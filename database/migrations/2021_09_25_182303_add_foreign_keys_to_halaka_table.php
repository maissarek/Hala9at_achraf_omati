<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHalakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('halaka', function (Blueprint $table) {
            $table->foreign('id_groupe', 'halaka_ibfk_1')->references('id')->on('groupe');
            $table->foreign('id_lieu', 'halaka_ibfk_2')->references('id')->on('lieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('halaka', function (Blueprint $table) {
            $table->dropForeign('halaka_ibfk_1');
            $table->dropForeign('halaka_ibfk_2');
        });
    }
}
