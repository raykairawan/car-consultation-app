<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('admin.index') : redirect()->route('login');
});

Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/unauthorized', function () {
    return 'Unauthorized';
});
