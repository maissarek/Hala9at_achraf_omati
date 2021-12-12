<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EnseiganteController,
EtudianteController,HalakaController,
UserController,PersonneController,
HistetudianteController,EnsetuhlkController,
HisthalakaController,RoleController,GroupController,LieuController};
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

Route::get('/personnes',[PersonneController::class,'index']);
Route::post('/personne_save',[PersonneController::class,'store']);
Route::get('/personne/{id}',[PersonneController::class,'show']);
Route::put('/personne/{id}',[PersonneController::class,'update']);

/////////////////////////////////////////////////////////////////////////////
Route::post('/user/login',[UserController::class,'login']);

Route::post('/admin/add',[PersonneController::class,'save_pers_admin']);
Route::middleware('auth:sanctum')->group( function () {


Route::get('/users/list', function () {
$this->authorize('viewAny', User::class);
return User::all();
});

Route::get('/user/profil',[UserController::class,'show']);
Route::put('/user/profil/edit',[UserController::class,'update']);
Route::post('/user/register',[UserController::class,'store']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);

Route::get('/enseignantes/list/names',[EnseiganteController::class,'all_enseignate_names']);
Route::get('/etudiantes/list/names',[EtudianteController::class,'all_etudiante_names']);
Route::get('/lieu/list/names',[LieuController::class,'all_lieu_names']);

Route::get('/enseignantes/list',[EnseiganteController::class,'all_enseignate']);
Route::get('/etudiantes/list',[EtudianteController::class,'all_etudiante']);
Route::get('/groupe/{id}/halakat',[HalakaController::class,'getHalakatbyGroupeId']);
Route::get('/groupe/list',[GroupController::class,'index']);
Route::get('/halakat/list',[HalakaController::class,'index']);
Route::get('/halaka/{id}/seances',[HisthalakaController::class,'index']);
Route::get('/halaka/{id}/etudiantes',[EtudianteController::class,'getEtudiantesbyHalakaId']);

Route::get('/etudiante/{id}',[EtudianteController::class,'show']);
Route::get('/enseignante/{id}',[EnseiganteController::class,'show']);
Route::get('/halaka/{id}',[HalakaController::class,'show']);
Route::get('/histhalaka/{id}',[HisthalakaController::class,'show']);

Route::put('/etudiante/update/{id}',[EtudianteController::class,'update']);
Route::put('/enseignante/update/{id}',[EnseiganteController::class,'update']);
Route::put('/halaka/update/{id}',[HalakaController::class,'update']);
Route::put('/histhalaka/update/{id}',[HisthalakaController::class,'update']);

Route::post('/enseignante/add',[PersonneController::class,'save_pers_ens']);
Route::post('/etudiante/add',[PersonneController::class,'save_pers_etu']);
Route::post('/halaka/add',[HalakaController::class,'store']);
Route::post('/histhalaka/add',[HisthalakaController::class,'store']);


Route::delete('/etudiante/delete/{id}',[EtudianteController::class,'destroy']);
Route::delete('/enseignante/delete/{id}',[EnseiganteController::class,'destroy']);
Route::delete('/halaka/delete/{id}',[HalakaController::class,'destroy']);
Route::delete('/histhalaka/delete/{id}',[HisthalakaController::class,'destroy']);
Route::delete('/lieu/delete/{id}',[LieuController::class,'destroy']);
Route::delete('/groupe/delete/{id}',[GroupeController::class,'destroy']);
Route::delete('/personne/{id}',[PersonneController::class,'destroy']);

});
/////////////////////////////////////////////////////////////////////////////

Route::get('/Histetudiante/{id}',[HistetudianteController::class,'show']);
Route::delete('/Histetudiante/{id}',[HistetudianteController::class,'destroy']);




Route::get('/Roles',[RoleController::class,'index']);
Route::post('/Role',[RoleController::class,'store']);
Route::get('/Role/{id}',[RoleController::class,'show']);
Route::put('/Role/{id}',[RoleController::class,'update']);
Route::delete('/Role/{id}',[RoleController::class,'destroy']);
