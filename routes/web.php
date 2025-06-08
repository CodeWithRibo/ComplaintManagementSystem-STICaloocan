<?php

use App\Models\Complaint;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

Route::get('/', [ComplaintController::class, 'index'])->name('index');

Route::get('SubmitForm',[ComplaintController::class, 'create'])->name('create');
Route::post('SubmitForm',[ComplaintController::class, 'store'])->name('store');

Route::get('View/{complaint}',[ComplaintController::class, 'show'])->name('show');
