<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnsetudhlkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensetudhlk', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_ens')->index('id_ens');
            $table->integer('id_etud')->index('id_etud');
            $table->integer('id_hlk')->index('id_hlk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ensetudhlk');
    }
}