<?php

namespace Database\Seeders;
use App\Models\Halaka;
use Illuminate\Database\Seeder;

class HalakaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Halaka::factory() ->count(3)
            ->forGroupe() ->create();
    }
}
