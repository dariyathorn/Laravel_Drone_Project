<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::post('/drones',[DroneController::class, 'store']);
Route::get('/drone/{id}',[DroneController::class, 'show']);
Route::put('/drone/{id}',[DroneController::class, 'update']);
Route::delete('/drone/{id}',[DroneController::class, 'destroy']);

Route::get('users',[UserController::class, 'index']);
Route::post('users',[UserController::class, 'store']);
Route::get('users/{id}',[UserController::class, 'show']);
Route::put('users/{id}',[UserController::class, 'update']);
Route::delete('users/{id}',[UserController::class, 'destroy']);


Route::get('/roles',[RoleController::class, 'index']);
Route::post('role', [RoleController::class, 'store']);
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);
Route::post('logout', [AuthenticationController::class, 'logout']);



Route::get('locations', [LocationController::class, 'index']);
Route::post('locations', [LocationController::class, 'store']);

Route::get('/maps', [MapController::class, 'index']);
Route::post('/map', [MapController::class, 'store']);
Route::get('/map/{id}', [MapController::class, 'show']);
Route::put('/map/{id}', [MapController::class, 'update']);
Route::delete('/map/{id}', [MapController::class, 'destroy']);


Route::get('/instructions', [InstructionController::class, 'index']);
Route::post('/instruction', [InstructionController::class, 'store']);
Route::get('/instruction/{id}', [InstructionController::class, 'show']);
Route::put('/instruction/{id}', [InstructionController::class, 'update']);
Route::delete('/instruction/{id}', [InstructionController::class, 'destroy']);
