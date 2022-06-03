<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::dropIfExists('permissions_role');
    Schema::dropIfExists('permissionsrole');
        Schema::create('permissionsrole', function (Blueprint $table) {
            $table->id();
              $table->unsignedInteger('permissions_id')->index('permissions_id');
            $table->unsignedInteger('role_id')->index('role_id');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissionsrole');
    }
}
