<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHisthalakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histhalaka', function (Blueprint $table) {
            $table->foreign('ensRemplacante_id', 'histhalaka_ibfk_1')->references('id')->on('enseigante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histhalaka', function (Blueprint $table) {
            $table->dropForeign('histhalaka_ibfk_1');
        });
    }
}
