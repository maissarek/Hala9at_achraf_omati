<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EnseiganteController,
EtudianteController,HalakaController,
CompteController,PersonneController,
HistetudianteController,EnsetuhlkController,
HisthalakaController,RoleController};
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
Route::get('/etudiantes',[EtudianteController::class,'index']);
Route::post('/etudiante_save',[EtudianteController::class,'store']);
Route::get('/etudiante/{id}',[EtudianteController::class,'show']);
Route::put('/etudiante/{id}',[EtudianteController::class,'update']);
Route::delete('/etudiante/{id}',[EtudianteController::class,'destroy']);

Route::get('/enseigantes',[EnseiganteController::class,'index']);
Route::post('/enseigante_save',[EnseiganteController::class,'store']);
Route::get('/enseigante/{id}',[EnseiganteController::class,'show']);
Route::put('/enseigante/{id}',[EnseiganteController::class,'update']);
Route::delete('/enseigante/{id}',[EnseiganteController::class,'destroy']);


Route::get('/',function(){
return view('welcome');
});


Route::get('/comptes',[CompteController::class,'index']);
Route::post('/compte',[CompteController::class,'store']);
Route::get('/comptes/{id}',[CompteController::class,'show']);
Route::put('/comptes/{id}',[CompteController::class,'update']);
Route::delete('/comptes/{id}',[CompteController::class,'destroy']);



Route::get('/halakat',[HalakaController::class,'index']);
Route::post('/halaka',[HalakaController::class,'store']);
Route::get('/halaka/{id}',[HalakaController::class,'show']);
Route::put('/halaka/{id}',[HalakaController::class,'update']);
Route::delete('/halaka/{id}',[HalakaController::class,'destroy']);

Route::get('/personnes',[PersonneController::class,'index']);
Route::post('/personne_save',[PersonneController::class,'store']);
Route::get('/personne/{id}',[PersonneController::class,'show']);
Route::put('/personne/{id}',[PersonneController::class,'update']);
Route::delete('/personne/{id}',[PersonneController::class,'destroy']);

/////////////////////////////////////////////////////////////////////////////




Route::get('/etudiante_list',[EtudianteController::class,'all_etudiante']);
Route::post('/enseignante_add',[PersonneController::class,'save_pers_ens']);
Route::post('/etudiante_add',[PersonneController::class,'save_pers_etu']);






/////////////////////////////////////////////////////////////////////////////
Route::get('/Histetudiantes',[HistetudianteController::class,'index']);
Route::post('/Histetudiante_save',[HistetudianteController::class,'store']);
Route::get('/Histetudiante/{id}',[HistetudianteController::class,'show']);
Route::put('/Histetudiante/{id}',[HistetudianteController::class,'update']);
Route::delete('/Histetudiante/{id}',[HistetudianteController::class,'destroy']);

Route::get('/Ensetuhlks',[EnsetuhlkController::class,'index']);
Route::post('/Ensetuhlk',[EnsetuhlkController::class,'store']);
Route::get('/Ensetuhlk/{id}',[EnsetuhlkController::class,'show']);
Route::put('/Ensetuhlk/{id}',[EnsetuhlkController::class,'update']);
Route::delete('/Ensetuhlk/{id}',[EnsetuhlkController::class,'destroy']);

Route::get('/Histhalakat',[HisthalakaController::class,'index']);
Route::post('/Histhalaka',[HisthalakaController::class,'store']);
Route::get('/Histhalaka/{id}',[HisthalakaController::class,'show']);
Route::put('/Histhalaka/{id}',[HisthalakaController::class,'update']);
Route::delete('/Histhalaka/{id}',[HisthalakaController::class,'destroy']);

Route::get('/Roles',[RoleController::class,'index']);
Route::post('/Role',[RoleController::class,'store']);
Route::get('/Role/{id}',[RoleController::class,'show']);
Route::put('/Role/{id}',[RoleController::class,'update']);
Route::delete('/Role/{id}',[RoleController::class,'destroy']);

