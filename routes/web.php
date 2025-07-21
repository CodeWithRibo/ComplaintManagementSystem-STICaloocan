<?php

use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\ChangePasswordController;
use App\Http\Controllers\user\ComplaintController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\ForgotPasswordController;
use App\Http\Controllers\user\ResetPasswordController;
use App\Http\Controllers\user\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::guard('web')->check()
        ? redirect()->route('dashboard.home')
        : redirect()->route('welcome');
});
//AUTHENTICATION ROUTE
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/home',[DashboardController::class, 'home'])->name('dashboard.home');
    // ----------------------------- Complaint Form --------------------------//
    Route::get('complaints/submit-form', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('complaints/submit-form', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('complaints/list-complaint', [DashboardController::class, 'listComplaint'])->name('dashboard.listComplaint');
    Route::get('complaints', SearchController::class)->name('search');
    Route::get('complaints/show-complaint', [ComplaintController::class, 'show'])->name('complaints.show');
    Route::get('complaints/edit-complaint/{complaint}', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::put('complaints/update-complaint/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::get('complaints/pending-complaint', [DashboardController::class, 'pending'])->name('complaints.pending');
    Route::get('complaints/in-progress-complaint', [DashboardController::class, 'inProgress'])->name('complaints.in-progress');
    Route::get('complaints/resolved-complaint', [DashboardController::class, 'resolved'])->name('complaints.resolved');
    Route::get('complaints/archived-complaint', [DashboardController::class, 'archived'])->name('complaints.archived');
    Route::get('dashboard/faq', [DashboardController::class, 'faq'])->name('dashboard.faq');
    Route::get('dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    // ----------------------------- Change Password --------------------------//
    Route::get('auth/change-password/{user}', [ChangePasswordController::class, 'showChangePassword'])->name('auth.changePassword');
    Route::post('auth/change-password/{user}', [ChangePasswordController::class, 'changePassword'])->name('changePassword');
});

Route::middleware(['guest'])->group( function (){
    Route::get('welcome', [DashboardController::class, 'welcome'])->name('welcome');
    // ----------------------------- Login --------------------------//
    Route::get('login',[AuthController::class, 'showLogin'])->name('show.login');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::get('terms-conditions',[DashboardController::class, 'termsConditions'])->name('terms-conditions');
    Route::get('privacy-policy',[DashboardController::class, 'privacyPolicy'])->name('privacy-policy');
// ----------------------------- Forget Password --------------------------//
    Route::get('forgot-password',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('show.link-request-form');
    Route::post('forgot-password',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('send-reset-link-email');
// ---------------------------- Reset Password ----------------------------//
    Route::get('reset-password/{token}',[ResetPasswordController::class, 'getPassword'])->name('get-password');
    Route::post('reset-password',[ResetPasswordController::class, 'updatePassword'])->name('update-password');

});
// ----------------------------- Logout --------------------------//
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    Auth::guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('welcome');
});

