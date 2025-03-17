<?php

use App\Host\Http\Controllers\HomeController;
use App\Host\Http\Controllers\Dashboard\DashboardController;
use App\Host\Http\Controllers\Property\PropertyController;
use Illuminate\Support\Facades\Route;

Route::prefix('host')->as('host.')->group(function () {
    Route::middleware('user.host')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware('user.auth')->group(function () {
        Route::get('/property/create/first', [PropertyController::class, 'first'])->name('property.create.first');
        Route::post('/property/create/first', [PropertyController::class, 'storeFirst'])->name('property.store.first');
    });
});

Route::get('host/home', [HomeController::class, 'index'])->name('host.home');