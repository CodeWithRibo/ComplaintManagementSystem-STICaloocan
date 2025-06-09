<?php

use App\Models\Complaint;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

Route::get('Navigation', function () {
    return view('Components.NavigationBar');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('index', [ComplaintController::class, 'index'])->name('index');

Route::get('SubmitForm',[ComplaintController::class, 'create'])->name('create');
Route::post('SubmitForm',[ComplaintController::class, 'store'])->name('store');

Route::get('View/{complaint}',[ComplaintController::class, 'show'])->name('show');


#EDIT COMPLAINT
Route::get('/{complaint}', [ComplaintController::class,'edit'])->name('edit');
Route::put('/{complaint}', [ComplaintController::class,'update'])->name('update');

Route::delete('Delete/{complaint}',[ComplaintController::class,'destroy'])->name('destroy');
