<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PermissionroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   DB::table('permissionsrole')->insert([
  'permissions_id'=>1,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);
  DB::table('permissionsrole')->insert([
  'permissions_id'=>2,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);
   DB::table('permissionsrole')->insert([
  'permissions_id'=>3,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]); DB::table('permissionsrole')->insert([
  'permissions_id'=>4,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]); DB::table('permissionsrole')->insert([
  'permissions_id'=>5,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]); DB::table('permissionsrole')->insert([
  'permissions_id'=>6,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]); DB::table('permissionsrole')->insert([
  'permissions_id'=>7,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]); DB::table('permissionsrole')->insert([
  'permissions_id'=>8,
  'role_id'=>1,	
'created_at'=>NOW(),'updated_at'=>NOW()
   ]); DB::table('permissionsrole')->insert([
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
   }
   }
