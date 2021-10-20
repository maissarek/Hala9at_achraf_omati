<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EnseiganteController,
EtudianteController,HalakaController,
UserController,PersonneController,
HistetudianteController,EnsetuhlkController,
HisthalakaController,RoleController,GroupController};
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

Route::post('/etudiante_save',[EtudianteController::class,'store']);
Route::put('/etudiante/{id}',[EtudianteController::class,'update']);
Route::get('/enseigantes',[EnseiganteController::class,'index']);
Route::post('/enseigante_save',[EnseiganteController::class,'store']);


Route::get('/',function(){
return view('welcome');
});


Route::get('/comptes',[UserController::class,'index']);
Route::get('/comptes/{id}',[UserController::class,'show']);
Route::put('/comptes/{id}',[UserController::class,'update']);
Route::delete('/comptes/{id}',[UserController::class,'destroy']);

Route::get('/personnes',[PersonneController::class,'index']);
Route::post('/personne_save',[PersonneController::class,'store']);
Route::get('/personne/{id}',[PersonneController::class,'show']);
Route::put('/personne/{id}',[PersonneController::class,'update']);
Route::delete('/personne/{id}',[PersonneController::class,'destroy']);

/////////////////////////////////////////////////////////////////////////////

Route::get('/enseignantes/list',[EnseiganteController::class,'all_enseignate']);
Route::get('/enseignantes/list/names',[EnseiganteController::class,'all_enseignate_names']);
Route::get('/etudiantes/list',[EtudianteController::class,'all_etudiante']);
Route::get('/groupe/{id}/halakat',[HalakaController::class,'getHalakatbyGroupeId']);
Route::get('/groupe/list',[GroupController::class,'index']);
Route::get('/halakat/list',[HalakaController::class,'index']);
Route::get('/halaka/{id}/seance',[HisthalakaController::class,'index']);
Route::get('/halaka/{id}/etudiantes',[EtudianteController::class,'getEtudiantesbyHalakaId']);

Route::get('/etudiante/{id}',[EtudianteController::class,'show']);
Route::get('/enseigante/{id}',[EnseiganteController::class,'show']);
Route::get('/halaka/{id}',[HalakaController::class,'show']);
Route::get('/histhalaka/{id}',[HisthalakaController::class,'show']);

Route::put('/etudiante/update/{id}',[EtudianteController::class,'update']);
Route::put('/enseignante/update/{id}',[EnseiganteController::class,'update']);
Route::put('/halaka/update/{id}',[HalakaController::class,'update']);
Route::put('/histhalaka/update/{id}',[HisthalakaController::class,'update']);

Route::post('/enseignante/add',[PersonneController::class,'save_pers_ens']);
Route::post('/etudiante/add',[PersonneController::class,'save_pers_etu']);
Route::post('/halaka/add',[HalakaController::class,'store']);
Route::delete('/histhalaka/add',[HisthalakaController::class,'store']);
Route::post('/user/add',[UserController::class,'store']);


Route::delete('/etudiante/delete/{id}',[EtudianteController::class,'destroy']);
Route::delete('/enseigante/delete/{id}',[EnseiganteController::class,'destroy']);
Route::delete('/halaka/delete/{id}',[HalakaController::class,'destroy']);
Route::delete('/histhalaka/delete/{id}',[HisthalakaController::class,'destroy']);

/////////////////////////////////////////////////////////////////////////////

Route::get('/Histetudiantes',[HistetudianteController::class,'index']);
Route::get('/Histetudiante/{id}',[HistetudianteController::class,'show']);
Route::delete('/Histetudiante/{id}',[HistetudianteController::class,'destroy']);




Route::get('/Roles',[RoleController::class,'index']);
Route::post('/Role',[RoleController::class,'store']);
Route::get('/Role/{id}',[RoleController::class,'show']);
Route::put('/Role/{id}',[RoleController::class,'update']);
Route::delete('/Role/{id}',[RoleController::class,'destroy']);
