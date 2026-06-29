<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Admin — public routes
Route::get('/admin/login',  [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin — protected routes
Route::middleware(\App\Http\Middleware\AdminAuthenticated::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
