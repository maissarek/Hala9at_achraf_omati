<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('personne_id')->index('personne_id');
            $table->string('username', 50);
            $table->string('password', 50);
            $table->date('dateCreation');
            $table->tinyInteger('etat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte');
    }
}
