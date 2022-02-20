<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->date('dateNaiss');
            $table->string('lieuNaiss', 500)->nullable();
            $table->string('adresse', 1000);
            $table->integer('telephone');
            $table->string('email', 500)->nullable();
            $table->tinyInteger('job');
            $table->string('fonction', 500)->nullable();
            $table->string('niveauScolaire', 50);
            $table->string('statusSocial', 500)->nullable();
            $table->tinyInteger('quittee')->default('0');
            $table->date('dateQuittee')->nullable();
            $table->date('dateEntree')->nullable();
            $table->softDeletes();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personne');
    }
}
