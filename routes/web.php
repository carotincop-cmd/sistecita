<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\UserController;
use App\Http\Controllers\Role\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\ClientController;
use App\Http\Controllers\Role\ServiceCategoryController;
use App\Http\Controllers\Role\ServiceController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('module:dashboard')->name('dashboard');

    Route::resource('roles', RoleController::class)
        ->except(['show'])
        ->middleware('module:roles');

    Route::resource('users', UserController::class)
        ->except(['show'])
        ->middleware('module:users');

    // 🔹 NUEVO → módulo de empleados
    Route::resource('employees', EmployeeController::class)
        ->except(['show'])   // si quieres permitir show simplemente quita esta línea
        ->middleware('module:employees');
    // 🔹 NUEVO → Módulo de clientes
    Route::resource('clients', ClientController::class)
        ->only(['index', 'destroy'])
        ->middleware('module:clients');

// ===========================
// 🟩 MÓDULO CATEGORÍAS DE SERVICIOS
// ===========================
Route::resource('service-categories', ServiceCategoryController::class)
    ->except(['show'])
    ->middleware('module:service-categories');

// ===========================
// 🟦 MÓDULO SERVICIOS
// ===========================
Route::resource('services', ServiceController::class) 
    ->except(['show'])
    ->middleware('module:services');
});