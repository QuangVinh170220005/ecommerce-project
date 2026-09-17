<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/profile', [ProfileController::class, 'getProfile']);
Route::post('/admin/profile', [ProfileController::class, 'updateProfile']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
