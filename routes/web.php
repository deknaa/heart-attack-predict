<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\admin\AnnouncementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route untuk user dengan role users
Route::middleware(['auth', 'userRole'])->group(function () {
    Route::get('dashboard/user', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destrwaoy'])->name('profile.destroy');

    // Route for Predict
    Route::get('predict', [PredictionController::class, 'predictionPage'])->name('predict');
    Route::get('history-predict', [PredictionController::class, 'historyPredict'])->name('predict.history');

    // Route for Articles
    // Route::get('article/view', UserView::class)->name('user.article.view');
    // Route::get('article/{slug}', UserDetails::class)->name('user.article.details');
});

// Route untuk user dengan role admin
Route::middleware(['auth', 'adminRole'])->group(function () {
    Route::get('dashboard/admin', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
    
    // Route for Articles
    Route::resource('article', ArticleController::class);
    Route::post('upload-image', [ImageUploadController::class, 'upload'])->name('image.upload');
    
    Route::get('users/data', [AdminDashboardController::class, 'usersData'])->name('users.data');
    Route::get('users/data/{id}', [AdminDashboardController::class, 'usersDetail'])->name('users.detail');

    Route::resource('admin/announcement', AnnouncementController::class);
});

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

require __DIR__.'/auth.php';
