<?php

use App\Models\Complaint;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

Route::get('/', [ComplaintController::class, 'index'])->name('index');
