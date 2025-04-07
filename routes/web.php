<?php

use App\Http\Controllers\PiezaController;
use App\Http\Controllers\UsoController;

// Ruta para crear el registro de uso
Route::get('/usos/create', [UsoController::class, 'create'])->name('usos.create');
Route::post('/usos', [UsoController::class, 'store'])->name('usos.store');

// Rutas de gestión de usos
Route::get('/usos/create', [UsoController::class, 'create'])->name('usos.create');
Route::post('/usos', [UsoController::class, 'store'])->name('usos.store');

// Ruta principal
Route::get('/', function () {
    return view('home'); // Redirige a la vista principal
})->name('home');

// Rutas de gestión de piezas
Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');
Route::get('/piezas/create', [PiezaController::class, 'create'])->name('piezas.create');
Route::post('/piezas', [PiezaController::class, 'store'])->name('piezas.store');
Route::get('/piezas/{pieza}/edit', [PiezaController::class, 'edit'])->name('piezas.edit');
Route::put('/piezas/{pieza}', [PiezaController::class, 'update'])->name('piezas.update');
Route::delete('/piezas/{pieza}', [PiezaController::class, 'destroy'])->name('piezas.destroy');

