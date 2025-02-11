<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Article\Admin\Create;
use App\Livewire\Article\Admin\Details;
use App\Livewire\Article\Admin\Edit;
use App\Livewire\Article\Admin\View;
use App\Livewire\Article\User\Details as UserDetails;
use App\Livewire\Article\User\View as UserView;
use App\Livewire\DashboardAdmin;
use App\Livewire\DashboardUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route untuk user dengan role users
Route::middleware(['auth', 'userRole'])->group(function () {
    Route::get('dashboard/user', DashboardUser::class)->name('dashboard');


    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destrwaoy'])->name('profile.destroy');

    // Route for Predict
    Route::get('predict', [PredictionController::class, 'predictionPage'])->name('predict');
    Route::get('history-predict', [PredictionController::class, 'historyPredict'])->name('predict.history');

    // Route for Articles
    Route::get('article/view', UserView::class)->name('user.article.view');
    Route::get('article/{slug}', UserDetails::class)->name('user.article.details');
});

// Route untuk user dengan role admin
Route::middleware(['auth', 'adminRole'])->group(function () {
    Route::get('dashboard/admin', DashboardAdmin::class)->name('dashboard.admin');
    
    // Route for Articles
    Route::get('admin/article/create', Create::class)->name('admin.article.create');
    Route::get('admin/article/view', View::class)->name('admin.article.view');
    Route::get('admin/article/{article}', Edit::class)->name('admin.article.edit');
    Route::get('admin/articles/{slug}', Details::class)->name('admin.article.details');
});

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

require __DIR__.'/auth.php';
