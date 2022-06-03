<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   DB::table('Permissions')->insert([
   'name' =>'user_create',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'user_update',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'user_delete',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'user_show',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'user_list',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

DB::table('Permissions')->insert([
   'name' =>'ens_create',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'ens_update',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'ens_delete',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'ens_show',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'ens_list',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'etu_create',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'etu_update',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'etu_delete',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'etu_show',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'etu_list',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'halaka_create',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'halaka_update',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'halaka_delete',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'halaka_show',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'halaka_list',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'seance_create',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'seance_update',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'seance_delete',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'seance_show',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'seance_list',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

 DB::table('Permissions')->insert([
   'name' =>'Dashboard_total',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);



   DB::table('Permissions')->insert([
   'name' =>'Dashboard_TotaletuByHlk',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'Dashboard_TotalhlkByens',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_TotalHlkByGroup',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_totalSkipStudentByYY',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_totalNewStudentByYY',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_StudentByHizb',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_StudentByAge',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

    DB::table('Permissions')->insert([
   'name' =>'Dashboard_TeacherByAge',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'Dashboard_StudentByAhkam',
'created_at'=>NOW(),'updated_at'=>NOW()
]);


DB::table('Permissions')->insert([
   'name' =>'Dashboard_RateLateStudents',
'created_at'=>NOW(),'updated_at'=>NOW()

   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_RateLateTeachers',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);

   DB::table('Permissions')->insert([
   'name' =>'Dashboard_TeachersAbsences',
'created_at'=>NOW(),'updated_at'=>NOW()

   ]);


DB::table('Permissions')->insert([
   'name' =>'Dashboard_TeachersAbsencesGlobal',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_StudentsAbsencesGlobal',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_StudentsAbsences',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);



   DB::table('Permissions')->insert([
   'name' =>'Dashboard_TeacherByFonction',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   DB::table('Permissions')->insert([
   'name' =>'Dashboard_StudentByFonction',
'created_at'=>NOW(),'updated_at'=>NOW()
   ]);


   



   }
   }