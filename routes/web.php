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
    Route::get('complaints/submit-form', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('complaints/submit-form', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('complaints/list-complaint', [DashboardController::class, 'listComplaint'])->name('dashboard.listComplaint');


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

//Route::get('complaints', [ComplaintController::class, 'index'])->name('complaints.index');
//Route::get('complaints/create', [ComplaintController::class, 'create'])->name('complaints.create');
//Route::post('complaints', [ComplaintController::class, 'store'])->name('complaints.store');
//Route::get('complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
//Route::get('complaints/{complaint}/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
//Route::put('complaints/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');
//Route::delete('complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
////
