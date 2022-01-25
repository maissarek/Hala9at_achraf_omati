<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HistetudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Histetudiante')->insert([
'HistHalaka_id'=>'1',
'ensEtudHlk_id'=>'2',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'/'
]);

 DB::table('Histetudiante')->insert([
'HistHalaka_id'=>'1',
'ensEtudHlk_id'=>'2',
'hizb'=>'60',
'elhifd'=>'جيد',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'55'
]);
DB::table('Histetudiante')->insert([
'HistHalaka_id'=>'1',
'ensEtudHlk_id'=>'6',
'hizb'=>'60',
'elhifd'=>'متوسطة',
'Elmorajaa'=>'متوسطة',
'Elmtn'=>'30'
]);
 DB::table('Histetudiante')->insert([
'HistHalaka_id'=>'3',
'ensEtudHlk_id'=>'4',
'hizb'=>'20',
'elhifd'=>'ث 7',
'Elmorajaa'=>'متوسطة',
'Elmtn'=>'5 أبيات من مخارج الحروف',
'retard'=>'1',
'justificatif'=>'عاملة' ]);

 DB::table('Histetudiante')->insert([
'HistHalaka_id'=>'2',
'ensEtudHlk_id'=>'1',
'hizb'=>'10',
'elhifd'=>'ث 5 ح 10 ',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'لم تحفظ']);

 DB::table('Histetudiante')->insert([
'HistHalaka_id'=>'1',
'ensEtudHlk_id'=>'3',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'متوسطة',
'Elmtn'=>'/']);
}
}
