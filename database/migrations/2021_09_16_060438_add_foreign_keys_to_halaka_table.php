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
        });
    }
}
