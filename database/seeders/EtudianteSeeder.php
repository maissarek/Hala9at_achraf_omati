<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Etudiante;
class EtudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Etudiante::factory()->times(5)->forPersonne()->create();
    }
}
