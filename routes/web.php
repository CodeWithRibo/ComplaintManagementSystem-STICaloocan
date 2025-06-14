<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

//AUTHENTICATION ROUTE
Route::get('/Register',[AuthController::class, 'showRegister'])->name('show.register');
Route::post('/Register',[AuthController::class, 'register'])->name('register');
Route::get('Login',[AuthController::class, 'showLogin'])->name('show.login');
Route::post('Login',[AuthController::class, 'login'])->name('login');
Route::post('Logout',[AuthController::class, 'logout'])->name('logout');
//Homepage
Route::get('home',[DashboardController::class, 'homePage'])->name('home');

Route::get('index', [ComplaintController::class, 'index'])->name('index');
Route::get('SubmitForm',[ComplaintController::class, 'create'])->name('create');
Route::post('SubmitForm',[ComplaintController::class, 'store'])->name('store');
Route::get('View/{complaint}',[ComplaintController::class, 'show'])->name('show');
Route::get('/{complaint}', [ComplaintController::class,'edit'])->name('edit');
Route::put('/{complaint}', [ComplaintController::class,'update'])->name('update');
Route::delete('Delete/{complaint}',[ComplaintController::class,'destroy'])->name('destroy');
