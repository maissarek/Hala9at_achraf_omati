<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(PersonneSeeder::class);
      $this->call(EnseiganteSeeder::class);
      $this->call(EtudianteSeeder::class);
      $this->call(GroupeSeeder::class);
      $this->call(LieuSeeder::class);
       $this->call(HalakaSeeder::class);
          $this->call(RoleSeeder::class);
            $this->call(EnsetuhlkSeeder::class);
             $this->call(UsersTableSeeder::class);
             $this->call(HisthalakaSeeder::class);
             $this->call(HistetudianteSeeder::class);
              $this->call(PermissionSeeder::class);
              $this->call(Permission_roleSeeder::class);
               $this->call(Users_roleSeeder::class);
    }
}
