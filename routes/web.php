<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard.home')
        : redirect()->route('welcome');
});
//Homepage
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/home',[DashboardController::class, 'home'])->name('dashboard.home');
});

//AUTHENTICATION ROUTE
Route::middleware(['guest'])->group( function (){
    Route::get('/welcome', [DashboardController::class, 'welcome'])->name('welcome');
    Route::get('/register',[AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/register',[AuthController::class, 'register'])->name('register');
    Route::get('login',[AuthController::class, 'showLogin'])->name('show.login');
    Route::post('login',[AuthController::class, 'login'])->name('login');
});

Route::post('logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('welcome');
});

//Route::get('index', [ComplaintController::class, 'index'])->name('index');
//Route::get('SubmitForm',[ComplaintController::class, 'create'])->name('create');
//Route::post('SubmitForm',[ComplaintController::class, 'store'])->name('store');
//Route::get('View/{complaint}',[ComplaintController::class, 'show'])->name('show');
//Route::get('/{complaint}', [ComplaintController::class,'edit'])->name('edit');
//Route::put('/{complaint}', [ComplaintController::class,'update'])->name('update');
//Route::delete('Delete/{complaint}',[ComplaintController::class,'destroy'])->name('destroy');
