<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHisthalakaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histhalaka', function (Blueprint $table) {
             $table->increments('id');
            $table->unsignedInteger('ensRemplacante')->index('ensRemplacante');
            $table->date('date');
            $table->string('moraja3a', 100);
            $table->string('moton', 500);
            $table->string('autres', 5000);
            $table->string('absence_Ens', 10);
            $table->string('justification_Ens', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histhalaka');
    }
}
