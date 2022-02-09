<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class HisthalakaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('histhalaka')->insert([//1
    'ensRemplacante_id'=>'1',
'date'=>'2022-01-22',
'morajaa'=>'من فصلت إلى الجاثية',
'moton'=>'/',
'autres'=>'/',
'absence_Ens'=>'1',
'justification_Ens'=>'ظروف خاصة',
'retard'=>'0'
             ]);

             DB::table('histhalaka')->insert([//2
   
'date'=>'2022-01-11',
'morajaa'=>'الحزب 1+2+3',
'moton'=>'المقدمة الجزرية',
'autres'=>'أكملنا مقرر الحلقة',
'absence_Ens'=>'0',
'retard'=>'0'
             ]);

             DB::table('histhalaka')->insert([//3
'date'=>'2022-01-14',
'morajaa'=>'الحزب 5 + 6',
'moton'=>'المقدمة الجزرية 4 أبواب',
'autres'=>'/',
'absence_Ens'=>'0',
'retard'=>'0' ]);

DB::table('histhalaka')->insert([//4
'date'=>'2022-02-09',
'morajaa'=>'الحزب 5 + 6',
'moton'=>'المقدمة الجزرية 4 أبواب',
'autres'=>'/',
'absence_Ens'=>'0',
'retard'=>'1' ]);

DB::table('histhalaka')->insert([//5
'date'=>'2022-02-09',
'morajaa'=>'الحزب 5 + 6',
'moton'=>'المقدمة الجزرية 4 أبواب',
'autres'=>'/',
'absence_Ens'=>'0',
'retard'=>'0' ]);
    }
}
