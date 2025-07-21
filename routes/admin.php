<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ComplaintManagementController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\user\AuthController;
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
    // ----------------------------- Complaint Management --------------------------//
    Route::get('all-complaints', [ComplaintManagementController::class, 'allComplaints'])->name('admin.all-complaints');
    Route::get('pending-complaints', [ComplaintManagementController::class, 'showPending'])->name('admin.pending-complaints');
    Route::get('in-progress-complaints', [ComplaintManagementController::class, 'showInProgress'])->name('admin.in-progress-complaints');
    Route::get('resolved-complaints', [ComplaintManagementController::class, 'showResolved'])->name('admin.resolved-complaints');
    Route::get('archived-complaints', [ComplaintManagementController::class, 'showArchived'])->name('admin.archived-complaints');
    Route::get('resolution-note/{complaint}', [ComplaintManagementController::class, 'showResolutionNote'])->name('admin.show-resolution-note');
    Route::put('resolution-note/{complaint}', [ComplaintManagementController::class, 'resolutionNote'])->name('admin.resolution-note');
    Route::get('progress-note/{complaint}', [ComplaintManagementController::class, 'showProgressNote'])->name('admin.show-progress-note');
    Route::put('progress-note/{complaint}', [ComplaintManagementController::class, 'progressNote'])->name('admin.progress-note');
    Route::put('in-progress/{complaint}', [ComplaintManagementController::class, 'inProgress'])->name('admin.in-progress');
    Route::put('resolved/{complaint}', [ComplaintManagementController::class, 'resolved'])->name('admin.resolved');
    Route::put('archived/{complaint}', [ComplaintManagementController::class, 'archived'])->name('admin.archived');
    Route::get('edit-complaint/{complaint}', [ComplaintManagementController::class, 'showEditComplaint'])->name('admin.show-edit-complaint');
    Route::post('edit-complaint/{complaint}', [ComplaintManagementController::class, 'editComplaint'])->name('admin.edit-complaint');
    // ----------------------------- User Management--------------------------//
    Route::get('student-accounts', [UserManagementController::class, 'showStudentAccount'])->name('admin.student-accounts');
    Route::get('admin-accounts', [UserManagementController::class, 'showAdminAccount'])->name('admin.admin-accounts');
    Route::get('student-accounts/user-profile/{user}', [UserManagementController::class, 'showUserProfile'])->name('admin.show-user-profile');
    Route::put('student-accounts/user-profile/{user}', [UserManagementController::class, 'editUserProfile'])->name('admin.user-profile');
    Route::post('student-accounts/change-password/{user}', [UserManagementController::class, 'userChangePassword'])->name('admin.user-change-password');
    Route::get('student-accounts/register',[AuthController::class, 'showRegister'])->name('show.register');
    Route::post('student-accounts/register',[AuthController::class, 'register'])->name('register');
    Route::delete('student-accounts/destroy/{user}',[UserManagementController::class, 'destroy'])->name('destroy');
    Route::delete('admin-accounts/destroy/{adminUser}',[UserManagementController::class, 'destroyAdminAccount'])->name('destroy.admin-account');
    Route::get('admin-accounts/admin-profile/{adminUser}',[UserManagementController::class, 'showAdminProfile'])->name('admin.show-admin-profile');
    Route::put('admin-accounts/admin-profile/{adminUser}',[UserManagementController::class, 'editAdminProfile'])->name('admin.admin-profile');
    Route::post('admin-accounts/change-password/{adminUser}', [UserManagementController::class, 'adminChangePassword'])->name('admin.admin-change-password');
    // ----------------------------- Overview & Reports --------------------------//
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');

});

    // ----------------------------- Logout --------------------------//
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/logout', function () {
    Auth::guard('admin')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('admin.show-login');
});
