<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;  // ← Cambiar a RolesController
use App\Http\Controllers\Admin\TestController;

Route::redirect('/', '/admin');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/test', [TestController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');  // ← Cambiar
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}', [RolesController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});