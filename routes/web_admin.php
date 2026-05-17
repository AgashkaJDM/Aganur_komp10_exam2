<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ModeliController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CarController;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
        Route::get('/admin/brands', [BrandController::class, 'index'])
            ->name('admin.brands.index');

            });

Route::controller(ModeliController::class)
    ->prefix('admin/models')
    ->name('admin.models.')
    ->group(function () {
        Route::get('/', [ModeliController::class, 'index'])
            ->name('index');

        Route::get('/create', [ModeliController::class, 'create'])
            ->name('create');

        Route::post('/', [ModeliController::class, 'store'])
            ->name('store');
            
        Route::get('/{id}/edit', [ModeliController::class, 'edit'])
        ->name('edit');
            
        Route::put('/{id}', [ModeliController::class, 'update'])
        ->name('update');

        Route::delete('/{id}', [ModeliController::class, 'destroy'])
        ->name('delete');
    });

Route::controller(CarController::class)
    ->prefix('admin/cars')
    ->name('admin.cars.')
    ->group(function() {
        Route::get('/', [CarController::class, 'index'])
            ->name('index');

        Route::get('/create', [CarController::class, 'create'])
            ->name('create');

        Route::post('/', [CarController::class, 'store'])
            ->name('store');
            
        Route::get('/{id}/edit', [CarController::class, 'edit'])
        ->name('edit');
            
        Route::put('/{id}', [CarController::class, 'update'])
        ->name('update');

        Route::delete('/{id}', [CarController::class, 'destroy'])
        ->name('delete');
    });



Route::controller(BrandController::class)
    ->prefix('admin/brands')
    ->name('admin.brands.')
    ->group(function() {
        Route::get('/', [BrandController::class, 'index'])
            ->name('index');

        Route::get('/create', [BrandController::class, 'create'])
            ->name('create');

        Route::post('/', [BrandController::class, 'store'])
            ->name('store');
            
        Route::get('/{id}/edit', [BrandController::class, 'edit'])
        ->name('edit');
            
        Route::put('/{id}', [BrandController::class, 'update'])
        ->name('update');

        Route::delete('/{id}', [BrandController::class, 'destroy'])
        ->name('delete');
    });

        


Route::middleware('guest')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
        Route::get('/login', [AuthController::class, 'show'])->name('login');
    });