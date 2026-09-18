<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Admin\CountryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/profile', [ProfileController::class, 'getProfile']);
Route::post('/admin/profile', [ProfileController::class, 'updateProfile']);

Route::get('/admin/country/list', [CountryController::class, 'getCountry']);
Route::get('/admin/country/add', [CountryController::class, 'addCountry']);
Route::post('/admin/country/store', [CountryController::class, 'store']);
Route::get('/admin/country/delete/{id}', [CountryController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
