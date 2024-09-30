<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/store', [TaskController::class, 'store']);
Route::get('/show/{task}', [TaskController::class, 'show']);
Route::put('/update/{task}', [TaskController::class, 'update']);
Route::delete('/destroy/{task}', [TaskController::class, 'destroy']);
Route::get('/index', [TaskController::class, 'index']);
