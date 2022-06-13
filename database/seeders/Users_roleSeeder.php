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
   $user= User::find(1);
$user->roles()->sync([1,2]);
   $user= User::find(2);
$user->roles()->sync([2]);
   $user= User::find(3);
$user->roles()->sync([2]);
   $user= User::find(4);
$user->roles()->sync([1,2]);
   $user= User::find(5);
$user->roles()->sync([2]);
   $user= User::find(6);
$user->roles()->sync([3]);
   $user= User::find(7);
$user->roles()->sync([3]);
   $user= User::find(8);
$user->roles()->sync([1,2]);
 $user= User::find(9);
$user->roles()->sync([3]);
 $user= User::find(10);
$user->roles()->sync([3]);
   $user= User::find(11);
$user->roles()->sync([2,3]);
 $user= User::find(12);
$user->roles()->sync([3]);


}
   }
