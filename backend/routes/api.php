<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClubController;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\LigaController;
use App\Http\Controllers\Api\PartidoController;

// Rutas públicas (solo lectura)
Route::get('/clubs', [ClubController::class, 'index']);
Route::get('/clubs/{club}', [ClubController::class, 'show']);
Route::get('/jugadores', [JugadorController::class, 'index']);
Route::get('/jugadores/{jugador}', [JugadorController::class, 'show']);
Route::get('/ligas', [LigaController::class, 'index']);
Route::get('/ligas/{liga}', [LigaController::class, 'show']);
Route::get('/partidos', [PartidoController::class, 'index']);
Route::get('/partidos/{partido}', [PartidoController::class, 'show']);

// Rutas protegidas (requieren token de admin)
Route::middleware(['admin.role'])->group(function () {
    Route::post('/clubs', [ClubController::class, 'store']);
    Route::put('/clubs/{club}', [ClubController::class, 'update']);
    Route::delete('/clubs/{club}', [ClubController::class, 'destroy']);

    Route::post('/jugadores', [JugadorController::class, 'store']);
    Route::put('/jugadores/{jugador}', [JugadorController::class, 'update']);
    Route::delete('/jugadores/{jugador}', [JugadorController::class, 'destroy']);

    Route::post('/ligas', [LigaController::class, 'store']);
    Route::put('/ligas/{liga}', [LigaController::class, 'update']);
    Route::delete('/ligas/{liga}', [LigaController::class, 'destroy']);

    Route::post('/partidos', [PartidoController::class, 'store']);
    Route::put('/partidos/{partido}', [PartidoController::class, 'update']);
    Route::delete('/partidos/{partido}', [PartidoController::class, 'destroy']);
});