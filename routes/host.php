<?php

use App\Host\Http\Controllers\HomeController;
use App\Host\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['user.auth', 'user.host'])->prefix('host')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('host.dashboard');
});
Route::get('host/home', [HomeController::class, 'index'])->name('host.home');
