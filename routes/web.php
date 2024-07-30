<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('super-admin.dashboard');
});
Route::get('admin/add-page', [AdminController::class, 'addPage'])->name('add-page');