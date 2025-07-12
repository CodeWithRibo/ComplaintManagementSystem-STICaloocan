<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Route;

// ----------------------------- Register --------------------------//
Route::get('/register', [AuthController::class, 'showRegister'])->name('admin.show-register');
Route::post('/register', [AuthController::class, 'register'])->name('admin.register');
// ----------------------------- Login --------------------------//
Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.show-login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
// ----------------------------- Dashboard --------------------------//
Route::get('/dashboard', function () {
    $name = "CarlJohn";
    return view('admin.dashboard.index', ['name' => $name]);
})->name('admin.index');
