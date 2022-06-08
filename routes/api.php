<?php


use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PasswordController,EnseiganteController,
EtudianteController,HalakaController,
UserController,PersonneController,
HistetudianteController,EnsetuhlkController,
HisthalakaController,RoleController,DashboardController,GroupController,LieuController};
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::get('/etudiantes',[EtudianteController::class,'index']);







Route::get('/',function(){
return view('welcome');
});

Route::post('/user/login',[UserController::class,'login']);

Route::post('/user/add',[PersonneController::class,'save_pers_admin']);
Route::get('/user/permissions',[User::class,'hasPermissions']);


Route::middleware('auth:sanctum')->group( function () {
//
//

Route::get('/users/list',[UserController::class,'all_users']);
Route::post('/user/logout', [UserController::class,'logout']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::put('/user/update/{id}',[UserController::class,'update']);
Route::post('/user/change-password',[PasswordController::class,'update']);
Route::post('/user/register',[UserController::class,'store']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);


Route::get('/enseignante/{id}/halakat',[EnseiganteController::class,'halakat_one_ens']);
Route::get('/enseignante/{id}/etudiantes',[EnseiganteController::class,'etudiantes_one_ens']);

Route::get('/enseignantes/list/names',[EnseiganteController::class,'all_enseignate_names']);
Route::get('/etudiantes/list/names',[EtudianteController::class,'all_etudiante_names']);
Route::get('/lieu/list/names',[LieuController::class,'all_lieu_names']);


Route::get('/dashboard/total',[DashboardController::class,'total']);
Route::get('/dashboard/total/etudiante/halaka/{id}',[DashboardController::class,'TotaletuByHlk']);
Route::get('/dashboard/total/enseignante/halaka',[DashboardController::class,'TotalhlkByens']);
Route::get('/dashboard/total/halaka/groupe',[DashboardController::class,'TotalHlkByGroup']);
Route::get('/dashboard/total/newetudiante/yy',[DashboardController::class,'totalNewStudentByYY']);
Route::get('/dashboard/total/skipetudiante/yy',[DashboardController::class,'totalSkipStudentByYY']);
Route::get('/dashboard/total/etudiantes/hizb',[DashboardController::class,'StudentByHizb']);
Route::post('/dashboard/ratelate/enseignantes',[DashboardController::class,'RateLateTeachers']);
Route::post('/dashboard/ratelate/etudiantes',[DashboardController::class,'RateLateStudents']);
Route::post('/dashboard/rateabsence/enseignantes/{id}',[DashboardController::class,'TeachersAbsences']);
Route::post('/dashboard/rateabsence/enseignantes',[DashboardController::class,'TeachersAbsencesGlobal']);
Route::post('/dashboard/rateabsence/etudiantes',[DashboardController::class,'StudentsAbsencesGlobal']);
Route::post('/dashboard/rateabsence/etudiantes/{id}',[DashboardController::class,'StudentsAbsences']);
Route::get('/dashboard/rate/etudiantes/age',[DashboardController::class,'StudentByAge']);
Route::get('/dashboard/rate/enseignante/age',[DashboardController::class,'TeacherByAge']);
Route::get('/dashboard/rate/etudiantes/fonction',[DashboardController::class,'StudentByFonction']);
Route::get('/dashboard/rate/enseignante/fonction',[DashboardController::class,'TeacherByFonction']);
Route::get('/dashboard/rate/etudiantes/ahkam',[DashboardController::class,'StudentByAhkam']);


Route::get('/role/list/names',[RoleController::class,'index']);
Route::get('/role/list',[RoleController::class,'index2']);
Route::get('/enseignantes/list',[EnseiganteController::class,'all_enseignate']);
Route::get('/etudiantes/list',[EtudianteController::class,'all_etudiante']);
Route::get('/groupe/{id}/halakat',[HalakaController::class,'getHalakatbyGroupeId']);
Route::get('/groupe/list',[GroupController::class,'index']);
Route::get('/halakat/list',[HalakaController::class,'index']);
Route::get('/halaka/{id}/seances',[HisthalakaController::class,'index']);
Route::get('/halaka/{id}/etudiantes',[EtudianteController::class,'getEtudiantesbyHalakaId']);

Route::get('/role/{id}',[RoleController::class,'show']);
Route::get('/etudiante/{id}',[EtudianteController::class,'show']);
Route::get('/enseignante/{id}',[EnseiganteController::class,'show']);
Route::get('/halaka/{id}',[HalakaController::class,'show']);
Route::get('/histhalaka/{id}',[HisthalakaController::class,'show']);

Route::put('/role/update/{id}',[RoleController::class,'update']);
Route::put('/etudiante/update/{id}',[EtudianteController::class,'update']);
Route::put('/user/update/{id}',[UserController::class,'update']);
Route::put('/enseignante/update/{id}',[EnseiganteController::class,'update']);
Route::put('/halaka/update/{id}',[HalakaController::class,'update']);
Route::put('/histhalaka/update/{id}',[HisthalakaController::class,'update']);
Route::put('personne/{id}/quitte',[EtudianteController::class,'quitte']);

Route::post('/role/add',[RoleController::class,'store']);
Route::post('/enseignante/add',[PersonneController::class,'save_pers_ens']);
Route::post('/etudiante/add',[PersonneController::class,'save_pers_etu']);
Route::post('/halaka/add',[HalakaController::class,'store']);
Route::post('/histhalaka/add',[HisthalakaController::class,'store']);


Route::delete('/role/delete/{id}',[RoleController::class,'destroy']);
Route::delete('/etudiante/delete/{id}',[EtudianteController::class,'destroy']);
Route::delete('/enseignante/delete/{id}',[EnseiganteController::class,'destroy']);
Route::delete('/halaka/delete/{id}',[HalakaController::class,'destroy']);
Route::delete('/histhalaka/delete/{id}',[HisthalakaController::class,'destroy']);
Route::delete('/lieu/delete/{id}',[LieuController::class,'destroy']);
Route::delete('/groupe/delete/{id}',[GroupController::class,'destroy']);

});
/////////////////////////////////////////////////////////////////////////////

