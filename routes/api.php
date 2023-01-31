<?php

use App\Http\Controllers\ConversationController;
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

Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
Route::get('/conversations/create', [ConversationController::class, 'create'])->name('conversations.create');
Route::post('/conversations', [ConversationController::class, 'store'])->name('conversations.store');
Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
Route::get('/conversations/{conversation}/edit', [ConversationController::class, 'edit'])->name('conversations.edit');
Route::put('/conversations/{conversation}', [ConversationController::class, 'update'])->name('conversations.update');
Route::delete('/conversations/{conversation}', [ConversationController::class, 'destroy'])->name('conversations.destroy');