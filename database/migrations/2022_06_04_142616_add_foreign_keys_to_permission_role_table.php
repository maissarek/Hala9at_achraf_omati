<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign(['permission_id'], 'permission_role_ibfk_1')->references(['id'])->on('permission');
            $table->foreign(['role_id'], 'permission_role_ibfk_2')->references(['id'])->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_role_ibfk_1');
            $table->dropForeign('permission_role_ibfk_2');
        });
    }
}
