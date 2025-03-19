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
        //First create property
        Route::get('/property/create/first', [PropertyController::class, 'first'])->name('property.create.first');
        Route::post('/property/create/first', [PropertyController::class, 'storeFirst'])->name('property.store.first');

        //Property
        Route::get('/property', [PropertyController::class, 'index'])->name('property.index');

        Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
        Route::post('/property/create', [PropertyController::class, 'store'])->name('property.store');

        Route::get('/property/{id}/edit', [PropertyController::class, 'edit'])->name('property.edit');
        Route::put('/property/update', [PropertyController::class, 'update'])->name('property.update');

        Route::delete('/property/{id}/delete', [PropertyController::class, 'delete'])->name('property.delete');
    });
});

Route::get('host/home', [HomeController::class, 'index'])->name('host.home');