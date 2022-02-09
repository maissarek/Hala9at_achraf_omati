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
       'personne_id'=>'1'
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
       'personne_id'=>'2'
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
       'personne_id'=>'3'
             ]);


           
 DB::table('etudiante')->insert([//4
    'niveauAhkam'=> 'تحت المتوسط',
       'teach'=> '0',
       'khatima'=> '0',
       'hizb'=> '20',
       'personne_id'=>'6'
             ]);

              DB::table('etudiante')->insert([//5
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'personne_id'=>'7'
             ]);

 DB::table('etudiante')->insert([//6
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'personne_id'=>'9'
             ]);

              DB::table('etudiante')->insert([//7
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'personne_id'=>'10'
             ]);

              DB::table('etudiante')->insert([//8
    'niveauAhkam'=> 'متوسطة',
      
       'teach'=> '0',
   
       'khatima'=> '0',
       'hizb'=> '10',
       'personne_id'=>'12'
             ]);
    }
}
