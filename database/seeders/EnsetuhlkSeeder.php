<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnsetuhlkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('ensetudhlk')->insert([
          'id_ens'=>'1',
'id_etud'=>'7',
'id_hlk'=>'6',
             ]);

                DB::table('ensetudhlk')->insert([
          'id_ens'=>'1',
'id_etud'=>'4',
'id_hlk'=>'6',
             ]);

                DB::table('ensetudhlk')->insert([
          'id_ens'=>'1',
'id_etud'=>'10',
'id_hlk'=>'7',
             ]);

                DB::table('ensetudhlk')->insert([
          'id_ens'=>'1',
'id_etud'=>'3',
'id_hlk'=>'8',
             ]);

                DB::table('ensetudhlk')->insert([
          'id_ens'=>'1',
        'id_etud'=>'2',
'id_hlk'=>'1',
             ]);

        DB::table('ensetudhlk')->insert([
          'id_ens'=>'4',
          'id_etud'=>'1',
          'id_hlk'=>'2',
             ]);
DB::table('ensetudhlk')->insert([
          'id_ens'=>'4',
          'id_etud'=>'11',
          'id_hlk'=>'2',
             ]);
         DB::table('ensetudhlk')->insert([
          'id_ens'=>'2',
          'id_etud'=>'8',
          'id_hlk'=>'3',
             ]);
              DB::table('ensetudhlk')->insert([
          'id_ens'=>'2',
          'id_etud'=>'9',
          'id_hlk'=>'3',
             ]);
             DB::table('ensetudhlk')->insert([
          'id_ens'=>'3',
          'id_etud'=>'5',
          'id_hlk'=>'4',
             ]);
             DB::table('ensetudhlk')->insert([
          'id_ens'=>'5',
          'id_etud'=>'6',
          'id_hlk'=>'5',
             ]);
    }
}
