<?php

namespace Database\Seeders;
use App\Models\{Groupe,Halaka};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('groupe')->insert([
        'name'=>'مجموعة الخاتمات'
             ]);
              DB::table('groupe')->insert([
        'name'=>'المجموعة العامة'
             ]);
              DB::table('groupe')->insert([
        'name'=>'مجموعة الفتيات'
             ]); 
    }
}
