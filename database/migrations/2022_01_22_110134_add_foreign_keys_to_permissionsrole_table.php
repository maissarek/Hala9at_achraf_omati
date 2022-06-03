<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermissionsroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissionsrole', function (Blueprint $table) {
            $table->foreign('permissions_id', 'permissionsrole_ibfk_1')->references('id')->on('permissions');
            $table->foreign('role_id', 'permissionsrole_ibfk_2')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissionsrole', function (Blueprint $table) {
            $table->dropForeign('permissionsrole_ibfk_1');
            $table->dropForeign('permissionsrole_ibfk_2');
        });
    }
}
