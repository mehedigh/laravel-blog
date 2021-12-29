<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// protected routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/category/destroy/{id}', [CategoryController::class, 'destroy']);
    Route::get('/post/destroy/{id}', [PostController::class, 'destroy']);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/post', PostController::class);
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('/dashboard/features', FeatureController::class);
});


// public routes
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'create']);
