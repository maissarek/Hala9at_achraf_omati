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
            'perso_id' => '1',
             'created_at'=>NOW()
        ]);

        DB::table('users')->insert([
            'name' => 'user_2',
            'mail' => 'user_2@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '2',
             'created_at'=>NOW()
        ]);

        DB::table('users')->insert([
            'name' => 'user_3',
            'mail' => 'user_3@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '3',
             'created_at'=>NOW()
        ]);
DB::table('users')->insert([
            'name' => 'user_4',
            'mail' =>'user_4@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '4',
             'created_at'=>NOW()
        ]);

     DB::table('users')->insert([
            'name' => 'user_5',
            'mail' =>'user_5@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '5',
             'created_at'=>NOW()
        ]);
             DB::table('users')->insert([
            'name' => 'user_6',
            'mail' =>'user_6@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '6',
             'created_at'=>NOW()
        ]);
     DB::table('users')->insert([
            'name' => 'user_7',
            'mail' =>'user_7@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '7',
             'created_at'=>NOW()
        ]);

         DB::table('users')->insert([
            'name' => 'user_8',
            'mail' =>'user_8@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '8',
             'created_at'=>NOW()
        ]);
         DB::table('users')->insert([
            'name' => 'user_9',
            'mail' =>'user_9@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '9',
             'created_at'=>NOW()
        ]);
         DB::table('users')->insert([
            'name' => 'user_10',
            'mail' =>'user_10@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '10',
             'created_at'=>NOW()
        ]);

        DB::table('users')->insert([
            'name' => 'user_11',
            'mail' =>'user_11@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '11',
             'created_at'=>NOW()

        ]);
        DB::table('users')->insert([
            'name' => 'user_12',
            'mail' =>'user_12@gmail.com',
            'password' => Hash::make('password'),
            'perso_id' => '12',
             'created_at'=>NOW()
        ]);

}
}
