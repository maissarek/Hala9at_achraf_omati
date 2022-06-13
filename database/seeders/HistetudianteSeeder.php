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

    DB::table('histetudiante')->insert([
'HistHalaka_id'=>'1',
'ensEtudHlk_id'=>'1',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'/','retard'=>'0',
'absent'=>'0'
]);

 DB::table('histetudiante')->insert([
'HistHalaka_id'=>'1',
'ensEtudHlk_id'=>'2',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'/','retard'=>'0',
'absent'=>'0'
]);

 DB::table('histetudiante')->insert([
'HistHalaka_id'=>'2',
'ensEtudHlk_id'=>'3',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'/','retard'=>'0',
'absent'=>'0'
]);

DB::table('histetudiante')->insert([
'HistHalaka_id'=>'3',
'ensEtudHlk_id'=>'4',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'/','retard'=>'0',
'absent'=>'0'
]);
DB::table('histetudiante')->insert([
'HistHalaka_id'=>'4',
'ensEtudHlk_id'=>'5',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'/',
'Elmtn'=>'/','retard'=>'0',
'absent'=>'0'
]);
        DB::table('histetudiante')->insert([
'HistHalaka_id'=>'5',
'ensEtudHlk_id'=>'6',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'/','retard'=>'0',
'absent'=>'0'
]);

 DB::table('histetudiante')->insert([
'HistHalaka_id'=>'5',
'ensEtudHlk_id'=>'7',
'hizb'=>'60',
'elhifd'=>'جيد',
'Elmorajaa'=>'جيدة',
'Elmtn'=>'55',
'retard'=>'0','absent'=>'0'
]);
DB::table('histetudiante')->insert([
'HistHalaka_id'=>'6',
'ensEtudHlk_id'=>'8',
'hizb'=>'60',
'elhifd'=>'متوسطة',
'Elmorajaa'=>'متوسطة',
'Elmtn'=>'30',
'retard'=>'1','absent'=>'0'
]);
 DB::table('histetudiante')->insert([
'HistHalaka_id'=>'6',
'ensEtudHlk_id'=>'9',
'hizb'=>'20',
'elhifd'=>'ث 7',
'Elmorajaa'=>'متوسطة',
'Elmtn'=>'5 أبيات من مخارج الحروف',
'retard'=>'0',
'justificatif'=>'عاملة',
'absent'=>'0' ]);

 DB::table('histetudiante')->insert([
'HistHalaka_id'=>'7',
'ensEtudHlk_id'=>'10',
'hizb'=>'10',
'elhifd'=>'ث 5 ح 10 ',
'Elmorajaa'=>'جيدة',
'retard'=>'1','Elmtn'=>'لم تحفظ',
'absent'=>'0']);

 DB::table('histetudiante')->insert([
'HistHalaka_id'=>'8',
'ensEtudHlk_id'=>'11',
'hizb'=>'60',
'elhifd'=>'/',
'Elmorajaa'=>'متوسطة',
'retard'=>'0','Elmtn'=>'/',
'absent'=>'1']);
}
}
