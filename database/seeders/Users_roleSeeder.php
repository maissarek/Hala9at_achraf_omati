<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Database\Seeder;

class Users_roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    DB::table('role_user')->insert([
      "user_id"=>"1",
      "rol_id"=>["1","2"]	
             ]);


    DB::table('role_user')->insert([
      "user_id"=>"2",
      "rol_id"=>"2"	
             ]);


    DB::table('role_user')->insert([
      "user_id"=>"3",
      "rol_id"=>"2"	
             ]);


     DB::table('role_user')->insert([
      "user_id"=>"4",
      "rol_id"=>["1","2"]	
             ]);

$user->roles()->sync();

     DB::table('role_user')->insert([
      "user_id"=>"5",
      "rol_id"=>"2"	
             ]);


     DB::table('role_user')->insert([
      "user_id"=>"6",
      "rol_id"=>"3"	
             ]);


     DB::table('role_user')->insert([
      "user_id"=>"7",
      "rol_id"=>"3"	
             ]);


     DB::table('role_user')->insert([
      "user_id"=>"8",
      "rol_id"=>["1","2"]	
             ]);


   DB::table('role_user')->insert([
      "user_id"=>"9",
      "rol_id"=>"3"	
             ]);


   DB::table('role_user')->insert([
      "user_id"=>"10",
      "rol_id"=>"3"	
             ]);

     DB::table('role_user')->insert([
      "user_id"=>"11",
      "rol_id"=>["2","3"]	
             ]);

   DB::table('role_user')->insert([
      "user_id"=>"12",
      "rol_id"=>"3"	
             ]);

}
   }
