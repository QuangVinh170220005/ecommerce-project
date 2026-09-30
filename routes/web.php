<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\user\AccountController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\BlogController as UserBlogController;
use App\Http\Controllers\user\ProductController;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//admin
Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/profile', [ProfileController::class, 'getProfile']);
Route::post('/admin/profile', [ProfileController::class, 'updateProfile']);

//country
Route::get('/admin/country/list', [CountryController::class, 'getCountry']);
Route::get('/admin/country/add', [CountryController::class, 'addCountry']);
Route::post('/admin/country/store', [CountryController::class, 'store']);
Route::get('/admin/country/delete/{id}', [CountryController::class, 'delete']);

//blog
Route::get('/admin/blog/list', [BlogController::class, 'getBlog']);
Route::get('/admin/blog/add', [BlogController::class, 'addBlog']);
Route::post('/admin/blog/store', [BlogController::class, 'store']);
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'editBlog']);
Route::post('/admin/blog/update/{id}', [BlogController::class, 'update']);
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete']);

//category
Route::get('/admin/category/list', [CategoryController::class, 'getCategory']);
Route::get('/admin/category/add', [CategoryController::class, 'add']);
Route::post('/admin/category/store', [CategoryController::class, 'store']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);

//brand
Route::get('/admin/brand/list', [BrandController::class, 'getBrand']);
Route::get('/admin/brand/add', [BrandController::class, 'add']);
Route::post('/admin/brand/store', [BrandController::class, 'store']);
Route::get('/admin/brand/delete/{id}', [BrandController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user
//auth
Route::get('/shop/register', [AuthController::class, 'register']);
Route::post('/shop/register/create', [AuthController::class, 'handleRegister']);
Route::get('/shop/login', [AuthController::class, 'login']);
Route::post('/shop/handleLogin', [AuthController::class, 'handleLogin']);
Route::get('/shop/logout', [AuthController::class, 'logout']);

//blog
Route::get('/shop/blog/list', [UserBlogController::class, 'getBlog']);
Route::get('/shop/blog/detail/{id}', [UserBlogController::class, 'getBlogDetail']);
Route::post('/shop/blog/detail/rate', [UserBlogController::class, 'blogRate']);
Route::post('/shop/blog/detail/comment', [UserBlogController::class, 'commentBlog']);
Route::post('/shop/blog/detail/replycmt', [UserBlogController::class, 'replyCmt']);

//account
Route::get('/shop/account/update', [AccountController::class, 'getAccount']);
Route::post('/shop/account/update', [AccountController::class, 'update']);
Route::get('/shop/account/add-product', [ProductController::class, 'addProduct']);
Route::post('/shop/account/store', [ProductController::class, 'store']);

