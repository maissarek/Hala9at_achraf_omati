<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

use Illuminate\Database\Seeder;

class Permission_roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   $role= Role::find(1);
$role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,
14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,
40,41,42,43,44,45
]);
$role2= Role::find(2);
$role2->permissions()->sync([2,4,7,9,12,14,15
//,16
,19,21,22,23,24,25,32]);


}
   }
