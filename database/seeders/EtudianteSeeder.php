<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Etudiante;
use Illuminate\Support\Facades\DB;
class EtudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('etudiante')->insert([//1
    'niveauAhkam'=> 'جيدة',
       'lieuKhatm'=> 'مسجد بن بولعيد',
       'dateKhatm'=> '2014-01-01',
       'ensKhatm'=>' الأستاذة سعيدة مكي',
       'teach'=> '1',
       'teachPlace'=> 'مسجد بن بولعيد',
       'khatima'=> '1',
       'hizb'=> '60',
       'person_id'=>'1'
             ]);

   DB::table('etudiante')->insert([//2
    'niveauAhkam'=> 'جيدة',
       'lieuKhatm'=> 'مسجد تشانشان ',
       'dateKhatm'=> '2015-01-01',
       'ensKhatm'=>' الأستاذة سمية ربيحة',
       'teach'=> '1',
       'teachPlace'=> 'مسجد بن بولعيد',
       'khatima'=> '1',
       'hizb'=> '60',
       'person_id'=>'2'
             ]);
DB::table('etudiante')->insert([//3
    'niveauAhkam'=> 'متقنة',
       'lieuKhatm'=> 'مسجد بوفاريك',
       'dateKhatm'=> '2019-03-14',
       'ensKhatm'=>' الأستاذة أمينة بن توتة',
       'teach'=> '1',
       'teachPlace'=> 'مسجد بن بولعيد',
       'khatima'=> '1',
       'hizb'=> '60',
       'person_id'=>'3'
             ]);


           
 DB::table('etudiante')->insert([//4
    'niveauAhkam'=> 'متقنة',
       'teach'=> '0',
       'khatima'=> '0',
       'hizb'=> '20',
       'person_id'=>'5'
             ]);

              DB::table('etudiante')->insert([//5
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '15',
       'person_id'=>'6'
             ]);

 DB::table('etudiante')->insert([//6
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'person_id'=>'7'
             ]);

              DB::table('etudiante')->insert([//7
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'person_id'=>'8'
             ]);

              DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'person_id'=>'9'
             ]);
             DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '8',
       'person_id'=>'10'
             ]);
             DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '9',
       'person_id'=>'11'

             ]);
             DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'person_id'=>'12'
             ]);

              DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متقنة',
      
       'teach'=> '0',
   
       'khatima'=> '1',
       'hizb'=> '60',
       'person_id'=>'13'
             ]);

             DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '25',
       'person_id'=>'14'
             ]);
             DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '5',
       'person_id'=>'15'
             ]);
    }
}
