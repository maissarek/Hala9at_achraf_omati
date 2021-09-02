<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnseiganteController;
use App\Http\Controllers\EtudianteController;
use App\Http\Controllers\HalakaController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\HistetudianteController;
use App\Http\Controllers\EnsetuhlkController;
use App\Http\Controllers\HisthalakaController;
use App\Http\Controllers\RoleController;
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
Route::get('/Etudiantes',[EtudianteController::class,'index']);
Route::post('/Etudiante_save',[EtudianteController::class,'store']);
Route::get('/Etudiante/{id}',[EtudianteController::class,'show']);
Route::put('/Etudiante/{id}',[EtudianteController::class,'update']);
Route::delete('/Etudiante/{id}',[EtudianteController::class,'destroy']);

Route::get('/Enseigantes',[EnseiganteController::class,'index']);
Route::post('/Enseigante_save',[EnseiganteController::class,'store']);
Route::get('/Enseigante/{id}',[EnseiganteController::class,'show']);
Route::put('/Enseigante/{id}',[EnseiganteController::class,'update']);
Route::delete('/Enseigante/{id}',[EnseiganteController::class,'destroy']);


Route::get('/',function(){
return view('welcome');
});


Route::get('/comptes',[CompteController::class,'index']);
Route::post('/compte',[CompteController::class,'store']);
Route::get('/comptes/{id}',[CompteController::class,'show']);
Route::put('/comptes/{id}',[CompteController::class,'update']);
Route::delete('/comptes/{id}',[CompteController::class,'destroy']);



Route::get('/Halakat',[HalakaController::class,'index']);
Route::post('/Halaka',[HalakaController::class,'store']);
Route::get('/Halaka/{id}',[HalakaController::class,'show']);
Route::put('/Halaka/{id}',[HalakaController::class,'update']);
Route::delete('/Halaka/{id}',[HalakaController::class,'destroy']);

Route::get('/personnes',[PersonneController::class,'index']);
Route::post('/personne_save',[PersonneController::class,'store']);
Route::get('/personne/{id}',[PersonneController::class,'show']);
Route::put('/personne/{id}',[PersonneController::class,'update']);
Route::delete('/personne/{id}',[PersonneController::class,'destroy']);

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

