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
      
    }
}
