<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comptes',[CompteController::class,'index']);
Route::post('/compte',[CompteController::class,'store']);
Route::get('/comptes/{id}',[CompteController::class,'show']);
Route::put('/comptes/{id}',[CompteController::class,'update']);
Route::delete('/comptes/{id}',[CompteController::class,'destroy']);

Route::get('/Enseigantes',[EnseiganteController::class,'index']);
Route::post('/Enseigante',[EnseiganteController::class,'store']);
Route::get('/Enseigante/{id}',[EnseiganteController::class,'show']);
Route::put('/Enseigante/{id}',[EnseiganteController::class,'update']);
Route::delete('/Enseigante/{id}',[EnseiganteController::class,'destroy']);

Route::get('/Etudiantes',[EtudianteController::class,'index']);
Route::post('/Etudiante',[EtudianteController::class,'store']);
Route::get('/Etudiante/{id}',[EtudianteController::class,'show']);
Route::put('/Etudiante/{id}',[EtudianteController::class,'update']);
Route::delete('/Etudiante/{id}',[EtudianteController::class,'destroy']);

Route::get('/Halakat',[HalakaController:class,'index']);
Route::post('/Halaka',[HalakaController:class,'store']);
Route::get('/Halaka/{id}',[HalakaController:class,'show']);
Route::put('/Halaka/{id}',[HalakaController:class,'update']);
Route::delete('/Halaka/{id}',[HalakaController:class,'destroy']);
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
