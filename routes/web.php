<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/dang-ky', [AuthController::class, 'register'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'store'])->name('store');

Route::get('/quen-mat-khau', [AuthController::class, 'forgotPassword'])->name('password.forgot');

Route::get('/login/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::middleware('user.auth')->group(function () {
    Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

    Route::get('/thong-bao', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('/get', [NotificationController::class, 'get'])->name('notification.get');
});
