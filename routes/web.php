<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard.home')
        : redirect()->route('welcome');
});
//AUTHENTICATION ROUTE
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/home',[DashboardController::class, 'home'])->name('dashboard.home');
    Route::get('complaints/submit-form', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('complaints/submit-form', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('complaints/list-complaint', [DashboardController::class, 'listComplaint'])->name('dashboard.listComplaint');
    Route::get('complaints', SearchController::class)->name('search');
    Route::get('complaints/show-complaint', [ComplaintController::class, 'show'])->name('complaints.show');
    Route::get('complaints/edit-complaint/{complaint}', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::put('complaints/update-complaint/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::get('complaints/pending-complaint', [DashboardController::class, 'pending'])->name('complaints.pending');
    Route::get('complaints/resolved-complaint', [DashboardController::class, 'resolved'])->name('complaints.resolved');
    Route::get('dashboard/faq', [DashboardController::class, 'faq'])->name('dashboard.faq');
    Route::get('dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    //UNDER DEVELOPMENT CHANGING PASSWORD
    Route::get('auth/change-password/{user}', [ChangePasswordController::class, 'testing'])->name('auth.changePassword');
    Route::post('auth/change-password/{user}', [ChangePasswordController::class, 'changePassword'])->name('changePassword');
});

Route::middleware(['guest'])->group( function (){
    Route::get('welcome', [DashboardController::class, 'welcome'])->name('welcome');
    Route::get('register',[AuthController::class, 'showRegister'])->name('show.register');
    Route::post('register',[AuthController::class, 'register'])->name('register');
    Route::get('login',[AuthController::class, 'showLogin'])->name('show.login');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::get('terms-conditions',[DashboardController::class, 'termsConditions'])->name('terms-conditions');
    Route::get('privacy-policy',[DashboardController::class, 'privacyPolicy'])->name('privacy-policy');
});

Route::post('logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('welcome');
});

