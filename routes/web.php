<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('module:dashboard')->name('dashboard');

    Route::resource('roles', RoleController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('module:roles');

    Route::resource('users', UserController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('module:users');

    Route::resource('employees', EmployeeController::class)
        ->except(['show', 'create', 'edit'])   
        ->middleware('module:employees');

    Route::resource('clients', ClientController::class)
        ->only(['index', 'destroy'])
        ->middleware('module:clients');

    Route::resource('service-categories', ServiceCategoryController::class)
        ->except(['show', 'create', 'edit'])
        ->middleware('module:service-categories');

    Route::resource('services', ServiceController::class) 
        ->except(['show', 'create', 'edit'])
        ->middleware('module:services');

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');
});