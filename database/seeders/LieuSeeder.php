<?php

namespace Database\Seeders;
use App\Models\{Lieu,Halaka};
use Illuminate\Database\Seeder;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lieu::factory()->times(4)->create();
    }
}
