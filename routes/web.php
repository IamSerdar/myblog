<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword']);
    Route::get('/profile/add-news', [NewsController::class, 'showAddNewsForm'])->name('news.add');
    Route::post('/profile/add-news', [NewsController::class, 'storeNews']);
});

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth.custom', 'role:admin,content_manager'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('news', Admin\NewsController::class);
});

Route::middleware(['auth.custom', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});
