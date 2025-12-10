<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/tarefas', [TarefasController::class, 'index']);
    Route::post('/tarefas', [TarefasController::class, 'store']);
    Route::get('/tarefas/{id}', [TarefasController::class, 'show']);
    Route::put('/tarefas/{id}', [TarefasController::class, 'update']);
    Route::delete('/tarefas/{id}', [TarefasController::class, 'destroy']);
});