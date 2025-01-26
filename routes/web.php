<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');

// login routes
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('login',[AuthController::class,'login']);

// register routes
Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
Route::post('register',[AuthController::class,'register']);

// logout route
Route::post('logout',[AuthController::class,'logout'])->name('logout');

