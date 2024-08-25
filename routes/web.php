<?php

use App\Http\Controllers\AdminConsultationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRuleController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserConsultationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('admin.index') : redirect()->route('user.index');
});

Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('consultation', [UserConsultationController::class, 'index'])->name('consultation.index');
        Route::get('consultation/create', [UserConsultationController::class, 'create'])->name('consultation.create');
        Route::post('consultation/', [UserConsultationController::class, 'store'])->name('consultation.store');
        Route::get('consultation/result/{consultation}', [UserConsultationController::class, 'result'])->name('consultation.result');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('names', NameController::class);
        Route::resource('factors', FactorController::class);
        Route::resource('answers', AnswerController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('consultations', AdminConsultationController::class);
        Route::resource('rules', AdminRuleController::class);
    });
});

Route::get('/unauthorized', function () {
    return 'Unauthorized';
});
