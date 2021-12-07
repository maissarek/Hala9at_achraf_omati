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
            $table->unsignedInteger('ensRemplacante_id')->nullable()->index('ensRemplacante');
            $table->date('date');
            $table->string('morajaa', 100);
            $table->string('moton', 500);
            $table->string('autres', 5000)->nullable();
            $table->tinyInteger('absence_Ens');
            $table->string('justification_Ens', 500)->nullable();
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
        Schema::dropIfExists('histhalaka');
    }
}
