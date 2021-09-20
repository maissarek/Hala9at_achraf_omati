<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEnseiganteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enseigante', function (Blueprint $table) {
            $table->foreign('personne_id', 'enseigante_ibfk_1')->references('id')->on('personne');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enseigante', function (Blueprint $table) {
            $table->dropForeign('enseigante_ibfk_1');
        });
    }
}
