<?php

use \App\Http\Controllers\Client\ModeliController;
use \App\Http\Controllers\Client\BrandController;
use \App\Http\Controllers\Client\HomeController;
use \App\Http\Controllers\Client\CarController;
use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')->where('locale', '[a-z]+');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::controller(CarController::class)
    ->prefix('cars')
    ->name('cars.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });


Route::controller(BrandController::class)
    ->prefix('brands')
    ->name('brands.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });


Route::controller(ModeliController::class)
    ->prefix('modeli')
    ->name('modeli.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });
