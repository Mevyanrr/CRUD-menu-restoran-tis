<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/{id}', [MenuController::class, 'show']);

Route::post('/menus', [MenuController::class, 'store']);

Route::put('/menus/{id}', [MenuController::class, 'update']);
Route::patch('/menus/{id}', [MenuController::class, 'update']);

Route::delete('/menus/{id}', [MenuController::class, 'destroy']);