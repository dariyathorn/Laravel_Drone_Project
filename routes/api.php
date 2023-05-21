<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\PlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/plans', [PlanController::class,'index']);
Route::post('/plan', [PlanController::class,'store']);
Route::get('/plan/{id}', [PlanController::class,'show']);
Route::put('/plan/{id}', [PlanController::class,'update']);
Route::delete('/plan/{id}', [PlanController::class,'destroy']);

Route::get('/drones',[DroneController::class, 'index']);
Route::post('/drone',[DroneController::class, 'store']);
Route::get('/drone/{id}',[DroneController::class, 'show']);
Route::put('/drone/{id}',[DroneController::class, 'update']);
Route::delete('/drone/{id}',[DroneController::class, 'destroy']);

