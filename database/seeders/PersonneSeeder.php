<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use  App\Models\{Personne,Halaka,Etudiante,Ensetuhlk,Groupe};
use Illuminate\Support\Facades\DB;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //1
    DB::table('personne')->insert([
 'nom'=>' حسيني',
'prenom'=> 'كنزة',
'dateNaiss'=>'1970-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0770774541',
'email'=> 'kanza_1@gmail.com',
'job'=> '1',
'fonction'=>'مطرجمة',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2007-01-01',

'quittee'=>'0'
]);


DB::table('personne')->insert([
//2
 'nom'=>' عمري',
'prenom'=> 'ريم',
'dateNaiss'=>'1997-01-01',
'adresse'=> 'اولاديعيش',
'telephone'=>'0699027428',
'email'=> 'rym_2@gmail.com',
'job'=> '1',
'fonction'=>'طبيبة',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2015-01-01',
'quittee'=>'0'
             ]);

             DB::table('personne')->insert([
             //3
 'nom'=>' قاسم',
'prenom'=> 'إكرام',
'dateNaiss'=>'2000-01-01',
'adresse'=> 'بوفاريك',
'telephone'=>'0770664510',
'email'=> 'ikram_3@gmail.com',
'job'=> '0',
'fonction'=>'ماكثة بالبيت',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'بوفاريك',
'dateEntree'=> '2016-01-01',
'quittee'=>'0'
             ]);

DB::table('personne')->insert([
 //4
 'nom'=>'مكي ',
'prenom'=> 'سعيدة',
'dateNaiss'=>'1967-01-01',
'adresse'=> 'بني مارد',
'telephone'=>'0771234540',
'email'=> 'saida_4@gmail.com',
'job'=> '1',
'fonction'=>'معلمة قرآن',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2000-01-01',
'quittee'=>'0']);

             DB::table('personne')->insert([
              //5
 'nom'=>'شنتير ',
'prenom'=> 'كوثر',
'dateNaiss'=>'1994-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0771234540',
'email'=> 'kawthar_5@gmail.com',
'job'=> '0',
'fonction'=>'ماكثة بالبيت',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'متزوجة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2005-01-01',
'quittee'=>'1',
'dateQuittee'=> '2022-01-01'             ]);


              DB::table('personne')->insert([
               //6
 'nom'=>' المغربي',
'prenom'=> 'حسينة',
'dateNaiss'=>'1970-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0550774541',
'email'=> 'hassina_6@gmail.com',
'job'=> '1',
'fonction'=>'معلمة أطفال',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'متزوجة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2015-01-01',
'quittee'=>'0']);

 DB::table('personne')->insert([//7
 'nom'=>' العريبي',
'prenom'=> 'هدى',
'dateNaiss'=>'2007-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0543774541',
'email'=> 'houda_7@gmail.com',
'job'=> '0',
'fonction'=>'',
'niveauScolaire'=>'ثانوي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2019-01-01',
'quittee'=>'0'
             ]);
              DB::table('personne')->insert([
               //8
 'nom'=>'ربيحة ',
'prenom'=> 'سمية',
'dateNaiss'=>'1989-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0771234540',
'email'=> 'soumia_5@gmail.com',
'job'=> '1',
'fonction'=>'معلمة جامعية',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2005-01-01',
'quittee'=>'0'
             ]);
 DB::table('personne')->insert([//9
 'nom'=>'  ركاب',
'prenom'=> 'رميساء',
'dateNaiss'=>'1997-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0543774541',
'email'=> 'romaissa@gmail.com',
'job'=> '0',
'fonction'=>'',
'niveauScolaire'=>'ثانوي',
'statusSocial'=> 'متزوجة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2008-01-01',
'quittee'=>'0'
             ]);

              DB::table('personne')->insert([//10
 'nom'=>' طريدي',
'prenom'=> 'ريان',
'dateNaiss'=>'2000-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0543774541',
'email'=> 'rayan@gmail.com',
'job'=> '0',
'fonction'=>'',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2010-01-01',
'quittee'=>'0'
             ]);
 DB::table('personne')->insert([//11
 'nom'=>'لكحل  ',
'prenom'=> 'عقيلة',
'dateNaiss'=>'1973-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0543774541',
'email'=> 'lekhal@gmail.com',
'job'=> '1',
'fonction'=>'طبيبة قلب',
'niveauScolaire'=>'جامعي',
'statusSocial'=> '/',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2008-01-01',
'quittee'=>'0'
             ]);
       DB::table('personne')->insert([//12
 'nom'=>'ليلى  ',
'prenom'=> 'زين',
'dateNaiss'=>'1973-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0543774541',
'email'=> 'z.leila@gmail.com',
'job'=> '0',
'fonction'=>'',
'niveauScolaire'=>'ثانوي',
'statusSocial'=> 'عازبة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2008-01-01',
'quittee'=>'0'
             ]);

 DB::table('personne')->insert([
 'nom'=>' بغلال',
'prenom'=> 'ياسمين',
'dateNaiss'=>'1994-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0770774541',
'email'=> 'kanza_1@gmail.com',
'job'=> '0',
'fonction'=>'ماكثة بالبيت',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'متزوجة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2007-01-01',
'dateQuittee'=> '2015-01-01'   ,
'quittee'=>'1'
]);

DB::table('personne')->insert([
 'nom'=>'خميسي',
'prenom'=> 'خديجة',
'dateNaiss'=>'1960-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0770774541',
'email'=> 'kanza_1@gmail.com',
'job'=> '1',
'fonction'=>'ماكثة بالبيت',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'متزوجة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2007-01-01',
'dateQuittee'=> '2022-01-23'   ,
'quittee'=>'1'
]);

DB::table('personne')->insert([
 'nom'=>'ديلمي',
'prenom'=> 'حورية',
'dateNaiss'=>'1997-01-01',
'adresse'=> 'بن بولعيد',
'telephone'=>'0770774541',
'email'=> 'kanza_1@gmail.com',
'job'=> '1',
'fonction'=>'/',
'niveauScolaire'=>'جامعي',
'statusSocial'=> 'متزوجة',
'lieuNaiss'=> 'البليدة',
'dateEntree'=> '2007-01-01',
'dateQuittee'=> '2010-01-23'  , 
'quittee'=>'1'
]);
}
}
