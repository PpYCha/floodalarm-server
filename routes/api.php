<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WaterLevelController;
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

Route::post('add-user', [UserController::class, 'store']);
Route::post("user-signin", [UserController::class, 'userLogin']);

Route::post("add-water", [WaterLevelController::class, 'store']);
Route::get("view-water", [WaterLevelController::class, 'index']);