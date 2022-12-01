<?php

use App\Http\Controllers\StarshipsController;
use App\Http\Controllers\VehiclesController;
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


Route::apiResource('vehicles',  VehiclesController::class)->names('api.v1.vehicles');

Route::apiResource('starships', StarshipsController::class)->names('api.v1.starships');


Route::get('starship/fetch_api', [StarshipsController::class, 'fetchApi']);

Route::get('vehicle/fetch_api', [VehiclesController::class, 'fetchApi']);

Route::get('starship/swapi', [StarshipsController::class, 'apiGetAll']);

Route::get('vehicle/swapi', [VehiclesController::class, 'apiGetAll']);



