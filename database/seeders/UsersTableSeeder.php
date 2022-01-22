<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'user_1',
            'mail' => 'user_1@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '1',
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'user_2',
            'mail' => 'user_2@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '2',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'user_3',
            'mail' => 'user_3@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '3',
            'role_id' => '2',
        ]);
DB::table('users')->insert([
            'name' => 'user_4',
            'mail' =>'user_4@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '4',
            'role_id' => '2',
        ]);

     DB::table('users')->insert([
            'name' => 'user_5',
            'mail' =>'user_5@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '5',
            'role_id' => '2',
        ]);
             DB::table('users')->insert([
            'name' => 'user_6',
            'mail' =>'user_6@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '6',
            'role_id' => '3',
        ]);
     DB::table('users')->insert([
            'name' => 'user_7',
            'mail' =>'user_7@gmail.com',
            'password' => Hash::make('password'),
            'personne_id' => '7',
            'role_id' => '3',
        ]);
}
}
