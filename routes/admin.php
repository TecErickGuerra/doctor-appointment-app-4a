<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PatientController;

Route::get('/', function(){
   return view('admin.dashboard'); 
})->name('dashboard');

//Gestión de roles
Route::resource('roles', RolesController::class);

//Gestión de usuarios
Route::resource('users', UserController::class);

//Gestión de pacientes
Route::resource('patients', PatientController::class);