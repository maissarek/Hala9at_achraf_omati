<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnseiganteController;
use App\Http\Controllers\EtudianteController;
use App\Http\Controllers\HalakaController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\HistetudianteController;
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



/*
Route::get('/comptes',[CompteController::class,'index']);
Route::post('/compte',[CompteController::class,'store']);
Route::get('/comptes/{id}',[CompteController::class,'show']);
Route::put('/comptes/{id}',[CompteController::class,'update']);
Route::delete('/comptes/{id}',[CompteController::class,'destroy']);

*/

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
/*
Route::get('/',[,'index']);
Route::post('/',[,'store']);
Route::post('/',[,'show']);
Route::put('/',[,'update']);
Route::delete('/',[,'destroy']);

Route::get('/',[,'index']);
Route::post('/',[,'store']);
Route::post('/',[,'show']);
Route::put('/',[,'update']);
Route::delete('/',[,'destroy']);

Route::get('/',[,'index']);
Route::post('/',[,'store']);
Route::post('/',[,'show']);
Route::put('/',[,'update']);
Route::delete('/',[,'destroy']);
*/
