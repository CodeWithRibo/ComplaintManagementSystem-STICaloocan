<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ComplaintManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return Auth::guard('web')->check()
        ? redirect()->route('admin.index')
        : redirect()->route('admin.show-login');
});
Route::middleware(['admin.guest'])->group( function (){
    // ----------------------------- Register --------------------------//
Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('admin.show-register');
Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
    // ----------------------------- Login --------------------------//
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.show-login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

Route::middleware(['admin.auth'])->group(function () {
    // ----------------------------- Dashboard --------------------------//
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::get('/all-complaints', [ComplaintManagementController::class, 'allComplaints'])->name('admin.all-complaints');

});

    // ----------------------------- Logout --------------------------//
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/logout', function () {
    Auth::guard('admin')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('admin.show-login');
});
