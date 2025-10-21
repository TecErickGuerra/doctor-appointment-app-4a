<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;

Route::get('/', function(){
   return view('admin.dashboard'); 
})->name('dashboard');

//Gestión de roles
Route::resource('roles', RolesController::class);