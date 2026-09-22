<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\user\AuthController;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//admin
Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/profile', [ProfileController::class, 'getProfile']);
Route::post('/admin/profile', [ProfileController::class, 'updateProfile']);

Route::get('/admin/country/list', [CountryController::class, 'getCountry']);
Route::get('/admin/country/add', [CountryController::class, 'addCountry']);
Route::post('/admin/country/store', [CountryController::class, 'store']);
Route::get('/admin/country/delete/{id}', [CountryController::class, 'delete']);

Route::get('/admin/blog/list', [BlogController::class, 'getBlog']);
Route::get('/admin/blog/add', [BlogController::class, 'addBlog']);
Route::post('/admin/blog/store', [BlogController::class, 'store']);
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'editBlog']);
Route::post('/admin/blog/update/{id}', [BlogController::class, 'update']);
Route::get('admin/blog/delete/{id}', [BlogController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user

Route::get('/shop/register', [AuthController::class, 'register']);
Route::post('/shop/register/create', [AuthController::class, 'handleRegister']);
Route::get('/shop/login', [AuthController::class, 'login']);
Route::post('/shop/handleLogin', [AuthController::class, 'handleLogin']);
