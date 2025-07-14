<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Route;
Route::middleware(['admin.guest'])->group( function (){
// ----------------------------- Register --------------------------//
Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('admin.show-register');
Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
// ----------------------------- Login --------------------------//
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.show-login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
// ----------------------------- Dashboard --------------------------//
});

Route::middleware(['admin.auth'])->group(function () {
Route::get('/dashboard', function () {
    $name = "CarlJohn";
    return view('admin.dashboard.index', ['name' => $name]);
})->name('admin.index');
});
