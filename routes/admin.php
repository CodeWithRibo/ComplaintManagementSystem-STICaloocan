<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('show-login');
