<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for Predict
    Route::get('/predict', [PredictionController::class, 'predictionPage'])->name('predict');
    Route::get('/history-predict', [PredictionController::class, 'historyPredict'])->name('predict.history');

    // Route for Articles
    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';
