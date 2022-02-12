<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Enseigante;
use Illuminate\Support\Facades\DB;


class EnseiganteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     DB::table('enseigante')->insert([
           'experienceTeaching' => '30 سنوات',
   'lieuKhatm'=>'مسجد الكوثر',
   'dateKhatm'=>'2001-01-01',
   'ensKhatm'=> 'الأستاذ بوشلوش',
   'Remplace'=>'0',
   'personne_id'=>'4'
             ]);

              DB::table('enseigante')->insert([
           'experienceTeaching' => '20 سنوات',
   'lieuKhatm'=>'مسجد بن بولعيد',
   'dateKhatm'=>'2008-06-01',
   'ensKhatm'=> 'الأستاذة سعيدة مكي',
   'Remplace'=>'0',
   'personne_id'=>'8'
             ]);


              DB::table('enseigante')->insert([
           'experienceTeaching' => '20 سنوات',
   'lieuKhatm'=>'مسجد بن بولعيد',
   'dateKhatm'=>'2008-06-01',
   'ensKhatm'=> 'الأستاذة سعيدة مكي',
   'Remplace'=>'0',
   'personne_id'=>'5'
             ]);

DB::table('enseigante')->insert([
           'experienceTeaching' => '5 سنوات',
   'lieuKhatm'=>'مسجد بن بولعيد',
   'dateKhatm'=>'2014-08-12',
   'ensKhatm'=> 'الأستاذة سعيدة مكي',
   'Remplace'=>'0',
   'personne_id'=>'11'
             ]);

DB::table('enseigante')->insert([
           'experienceTeaching' => '3 سنوات ',
   'lieuKhatm'=>'مسجد تشانشان',
   'dateKhatm'=>'2016-08-12',
   'ensKhatm'=> 'الأستاذة سمية ربيحة',
   'Remplace'=>'0',
   'personne_id'=>'1'
             ]);

             DB::table('enseigante')->insert([
           'experienceTeaching' => 'سنة 1',
   'lieuKhatm'=>'مسجد بوفاريك',
   'dateKhatm'=>'2019-03-14',
   'ensKhatm'=> 'الأستاذة أمينة بن توتة',
   'Remplace'=>'1',
   'personne_id'=>'3'
             ]);

             DB::table('enseigante')->insert([
           'experienceTeaching' => '1 سنوات',
   'lieuKhatm'=>'مسجد بن بولعيد',
   'dateKhatm'=>'2008-06-01',
   'ensKhatm'=> 'الأستاذة سعيدة مكي',
   'Remplace'=>'1',
   'personne_id'=>'2'
             ]); 
             }
}
