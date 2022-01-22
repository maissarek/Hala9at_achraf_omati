<?php

namespace Database\Seeders;
use App\Models\{Lieu,Halaka};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('lieu')->insert([
            'name' => 'باب السيدة خديجة',
             ]);

     DB::table('lieu')->insert([
            'name' => 'سدة النساء',
             ]);

              DB::table('lieu')->insert([
            'name' => 'المدرسة القرآنية',
             ]);
    }
}
