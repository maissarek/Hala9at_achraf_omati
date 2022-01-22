<?php

namespace Database\Seeders;
use App\Models\Halaka;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HalakaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('halaka')->insert([
           'name'=> 'الحلقة 1',
           'jour'=> 'السبت',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'60',
           'fiaMax'=> '60',
           'id_groupe'=>'1',
           'id_lieu'=>'2',
             ]);

             DB::table('halaka')->insert([
           'name'=> 'الحلقة 2',
           'jour'=> 'الثلاثاء',
           'tempsDebut'=> '13:00:00',
           'tempsFin'=> '16:00:00',
           'fiaMin' =>'20',
           'fiaMax'=> '30',
           'id_groupe'=>'2',
           'id_lieu'=>'3',
             ]);
              DB::table('halaka')->insert([
           'name'=> 'الحلقة 3',
           'jour'=> 'الجمعة',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'01',
           'fiaMax'=> '10',
           'id_groupe'=>'3',
           'id_lieu'=>'2',
             ]);
    }
}
