<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

// Ruta temporal SIN autenticación para probar
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Después puedes mover la ruta admin aquí cuando esté funcionando
});