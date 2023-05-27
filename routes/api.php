<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanDroneController;
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


Route::middleware(['auth:sanctum'])->group(function () {
   
    /////-------Location------API---------
    Route::get('locations', [LocationController::class, 'index']);
    Route::post('locations', [LocationController::class, 'store']);


    //------------Maps-----API----------------
    Route::post('/map', [MapController::class, 'store']);
    Route::get('/maps', [MapController::class, 'index']);
    Route::get('/map/{id}', [MapController::class, 'show']);
    Route::put('/map/{id}', [MapController::class, 'update']);
    Route::delete('/map/{id}', [MapController::class, 'destroy']);

/////--------DownloadImage------API------------
    Route::get('/maps/{name}/{id}', [MapController::class, 'DownloadImage']);
    Route::delete('/maps/{name}/{id}', [MapController::class, 'DownloadImage']);
    Route::post('/maps/{name}/{id}', [MapController::class, 'DownloadImage']);


   //--------Drone-----API-------------
    Route::get('/drones',[DroneController::class, 'index']);
    Route::post('/drones',[DroneController::class, 'store']);
    Route::delete('/drone/{id}',[DroneController::class, 'destroy']);
    // Route::put('/drones/{id}',[DroneController::class, 'update']);
    Route::get('/drones/{id}',[DroneController::class, 'show']);

    //---------update drones------------
    Route::put('/drones/{drone_id}', [PlanDroneController::class, 'update']);

    //--------get location from drone------API------
    Route::get('/droneLocation/{id}',[DroneController::class, 'locationDrone']);

/////---------Plan---API--------------
    Route::get('/plans', [PlanController::class,'index']);
    Route::post('/plan', [PlanController::class,'store']);
    Route::get('/plan/{id}', [PlanController::class,'show']);
    Route::put('/plan/{id}', [PlanController::class,'update']);
    Route::delete('/plan/{id}', [PlanController::class,'destroy']);

    ////-------Get--Plan----------
    Route::get('/planName/{type}', [PlanController::class, 'getPlan']);

    // --------Farm-------------------
    Route::post('/farms', [FarmController::class, 'store']);
    Route::get('/farms',[FarmController::class, 'index']);


    

    ///---------insturctions-------------
    Route::get('/insturctions', [PlanDroneController::class, 'index']);
    Route::post('/insturctions', [PlanDroneController::class, 'store']);

    
    
    
    Route::post('logout', [AuthenticationController::class, 'logout']);
    
    
});


Route::get('users',[UserController::class, 'index']);
Route::post('users',[UserController::class, 'store']);
Route::get('users/{id}',[UserController::class, 'show']);
Route::put('users/{id}',[UserController::class, 'update']);
Route::delete('users/{id}',[UserController::class, 'destroy']);


Route::get('/roles',[RoleController::class, 'index']);
Route::post('role', [RoleController::class, 'store']);
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);


// Route::get('/drones',[DroneController::class, 'index']);
// Route::post('/drones',[DroneController::class, 'store']);

// Route::get('/drones/{id}',[DroneController::class, 'show']);


// Route::get('/plans', [PlanController::class,'index']);
// Route::post('/plan', [PlanController::class,'store']);
// Route::get('/plan/{id}', [PlanController::class,'show']);
// Route::put('/plan/{id}', [PlanController::class,'update']);
// Route::delete('/plan/{id}', [PlanController::class,'destroy']);



// Route::get('users',[UserController::class, 'index']);
// Route::post('users',[UserController::class, 'store']);
// Route::get('users/{id}',[UserController::class, 'show']);
// Route::put('users/{id}',[UserController::class, 'update']);
// Route::delete('users/{id}',[UserController::class, 'destroy']);


// Route::get('/roles',[RoleController::class, 'index']);
// Route::post('role', [RoleController::class, 'store']);
// Route::post('register', [AuthenticationController::class, 'register']);
// Route::post('login', [AuthenticationController::class, 'login']);



// Route::get('locations', [LocationController::class, 'index']);
// Route::post('locations', [LocationController::class, 'store']);

// Route::post('/map', [MapController::class, 'store']);
// Route::get('/maps', [MapController::class, 'index']);
// Route::get('/map/{id}', [MapController::class, 'show']);
// Route::put('/map/{id}', [MapController::class, 'update']);
// Route::delete('/map/{id}', [MapController::class, 'destroy']);


// Route::get('/maps/{name}/{id}', [MapController::class, 'DownloadImage']);
// Route::delete('/maps/{name}/{id}', [MapController::class, 'DownloadImage']);
// Route::post('/maps/{name}/{id}', [MapController::class, 'DownloadImage']);

// Route::post('/plans/{type}', [PlanController::class, 'getPlan']);


// Route::get('/insturctions', [PlanDroneController::class, 'index']);
// Route::post('/insturctions', [PlanDroneController::class, 'store']);

// Route::post('/farms', [FarmController::class, 'store']);
