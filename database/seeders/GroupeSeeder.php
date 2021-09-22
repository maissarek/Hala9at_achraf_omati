<?php

namespace Database\Seeders;
use App\Models\{Groupe,Halaka};
use Illuminate\Database\Seeder;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Groupe::factory()->times(3)->create();
    }
}
