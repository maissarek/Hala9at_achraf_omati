<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'libelle' => 'إدارية',
             ]);
              DB::table('role')->insert([
            'libelle' => 'معلمة',
             ]);
              DB::table('role')->insert([
            'libelle' => 'طالبة',
             ]);

             /*$role= Role::find(1);
$role->Permissions()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,
14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,
40,41,42,43]);*/
    }
}
