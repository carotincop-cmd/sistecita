<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\Api\BusinessSettingController;
use App\Http\Controllers\Api\GalleryApiController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/carousel', [CarouselController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/services', [ServicioController::class, 'index']);
Route::get('/business-setting', [BusinessSettingController::class, 'index']);
Route::get('/gallery', [GalleryApiController::class, 'index']);