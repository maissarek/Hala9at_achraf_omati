<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Enseigante;


class EnseiganteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
Enseigante::factory()->times(5)->forPersonne()->create();
    }
}
