<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\{Personne,Halaka,Etudiante,Ensetuhlk,Groupe};
class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Personne::factory()->times(5)->create();
    }
}
