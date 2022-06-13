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
40,41,42,43]);
$role2= Role::find(2);
$role2->permissions()->sync([2,4,7,9,12,14,15,19,21,22,23,24,25,32]);
/*$role3= Role::find(3);
$role3->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,
14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,
40,41,42,43]);*/
/*

DB::table('permissionsrole')->insert([
  'permissions_id'=>5,
  'role_id'=>2,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);
   DB::table('permissionsrole')->insert([
  'permissions_id'=>6,
  'role_id'=>2,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);
   DB::table('permissionsrole')->insert([
  'permissions_id'=>7,
  'role_id'=>2,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);DB::table('permissionsrole')->insert([
  'permissions_id'=>8,
  'role_id'=>2,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);DB::table('permissionsrole')->insert([
  'permissions_id'=>8,
  'role_id'=>3,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);
   */}
   }
