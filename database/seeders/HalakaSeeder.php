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
        'fiaMin' =>'/',
           'fiaMax'=> '/',
           'id_groupe'=>'1',
           'id_lieu'=>'2',
           'khatimat' =>'1'
             ]);

        DB::table('halaka')->insert([
           'name'=> 'الحلقة 2',
           'jour'=> 'السبت',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'/',
           'fiaMax'=> '/',
           'khatimat' =>'1',
           'id_groupe'=>'1',
           'id_lieu'=>'2',
             ]);

             DB::table('halaka')->insert([
           'name'=> 'الحلقة 3',
           'jour'=> 'السبت',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
             'khatimat' =>'1',
           'id_groupe'=>'1',
           'id_lieu'=>'2',
             ]);

             DB::table('halaka')->insert([
           'name'=> 'الحلقة أ',
           'jour'=> 'الثلاثاء',
           'tempsDebut'=> '13:00:00',
           'tempsFin'=> '16:00:00',
           'fiaMin' =>'20',
           'fiaMax'=> '30',
            'khatimat' =>'0',
           'id_groupe'=>'2',
           'id_lieu'=>'3',
             ]);
              DB::table('halaka')->insert([
           'name'=> 'الحلقة a',
           'jour'=> 'الجمعة',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'01',
           'fiaMax'=> '10',
            'khatimat' =>'0',
           'id_groupe'=>'3',
           'id_lieu'=>'2',
             ]);

            
            DB::table('halaka')->insert([
           'name'=> '1',
           'jour'=> 'الجمعة',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'01',
           'fiaMax'=> '10',
            'khatimat' =>'0',
           'id_groupe'=>'4',
           'id_lieu'=>'2',
             ]);DB::table('halaka')->insert([
           'name'=> '2',
           'jour'=> 'الجمعة',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'01',
           'fiaMax'=> '10',
            'khatimat' =>'0',
           'id_groupe'=>'4',
           'id_lieu'=>'2',
             ]);
              DB::table('halaka')->insert([
           'name'=> '3',
           'jour'=> 'الجمعة',
           'tempsDebut'=> '08:00:00',
           'tempsFin'=> '12:00:00',
           'fiaMin' =>'01',
           'fiaMax'=> '10',
            'khatimat' =>'0',
           'id_groupe'=>'4',
           'id_lieu'=>'2',
             ]);
}
}
