<?php

use App\Exports\PredictionsExport;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\UserArticleController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('index');
});

Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile/{id}', [ProfileController::class, 'updateData'])->name('profile.update');
Route::get('predictions/{id}', [PredictionController::class, 'show'])->name('predict.show');
// Route for PDF file download
    Route::get('laporan/{id}/download', [PredictionController::class, 'generatePDF'])->name('pdf.download');

// Route untuk user dengan role users
Route::middleware(['auth', 'userRole'])->group(function () {
    Route::get('dashboard/user', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/user/predictions', [UserDashboardController::class, 'getUserPredictions']);
    Route::get('dashboard/user/risk-assessment', [UserDashboardController::class, 'getLatestRiskAssessment']);
    
    // Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for Predict
    Route::get('predict', [PredictionController::class, 'index'])->name('predict');
    Route::post('predict', [PredictionController::class, 'predict'])->name('predict');
    Route::get('predict-history', [PredictionController::class, 'history'])->name('predict.history');

    // Route for article
    Route::get('article/list', [UserArticleController::class, 'list'])->name('article.list');
    Route::get('article/list/{slug}/detail', [UserArticleController::class, 'detail'])->name('article.detail');

    // Route for export excel
    Route::get('export/excel/predictions', function() {
        return Excel::download(new PredictionsExport, 'predictions.xlsx');
    });
});

// Route untuk user dengan role admin
Route::middleware(['auth', 'adminRole'])->group(function () {
    Route::get('dashboard/admin', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
    
    // Route for Articles
    Route::resource('article', ArticleController::class);
    Route::post('upload-image', [ImageUploadController::class, 'upload'])->name('image.upload');
    
    Route::get('users/data', [AdminDashboardController::class, 'usersData'])->name('users.data');
    Route::get('users/data/{id}', [AdminDashboardController::class, 'usersDetail'])->name('users.detail');
});

// Google Callback
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

require __DIR__.'/auth.php';
