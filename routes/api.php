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
Route::post('/comptes/{id}',[CompteController::class,'show']);
Route::put('/comptes/{id}',[CompteController::class,'update']);
Route::delete('/comptes/{id}',[CompteController::class,'destroy']);

Route::get('/Enseigantes',[EnseiganteController::class,'index']);
Route::post('/Enseigante',[EnseiganteController::class,'store']);
Route::post('/Enseigantes/{id}',[EnseiganteController::class,'show']);
Route::put('/Enseigantes/{id}',[EnseiganteController::class,'update']);
Route::delete('/Enseigantes/{id}',[EnseiganteController::class,'destroy']);
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
