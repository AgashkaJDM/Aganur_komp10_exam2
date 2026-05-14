<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

Route::middleware('guest')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
        Route::get('/login', [AuthController::class, 'show'])->name('login');
    });