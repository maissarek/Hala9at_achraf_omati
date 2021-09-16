<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCompteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compte', function (Blueprint $table) {
            $table->foreign('personne_id', 'compte_ibfk_1')->references('id')->on('personne');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compte', function (Blueprint $table) {
            $table->dropForeign('compte_ibfk_1');
        });
    }
}
