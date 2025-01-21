<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Livewire\DashboardAdmin;
use App\Livewire\DashboardUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route untuk user dengan role users
Route::middleware(['auth', 'userRole'])->group(function () {
    Route::get('/dashboard/user', DashboardUser::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for Predict
    Route::get('/predict', [PredictionController::class, 'predictionPage'])->name('predict');
    Route::get('/history-predict', [PredictionController::class, 'historyPredict'])->name('predict.history');

    // Route for Articles
    
});

// Route untuk user dengan role admin
Route::middleware(['auth', 'adminRole'])->group(function () {
    Route::get('dashboard/admin', DashboardAdmin::class)->name('dashboard.admin');
});

require __DIR__.'/auth.php';
