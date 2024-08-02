<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('super-admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
  Route::get('admin/add-page', [AdminController::class, 'addPage'])->name('add-page');
  Route::post('admin/add-page', [AdminController::class, 'addPagePost'])->name('add-page-post');
  Route::get('admin/edit-page/{id}', [AdminController::class, 'editPage'])->name('edit-page');
  Route::post('admin/edit-page/{id}', [AdminController::class, 'editPagePost'])->name('edit-page-post');
  Route::get('admin/delete-page/{id}', [AdminController::class, 'deletePage'])->name('delete-page');
  Route::get('admin/add-counties', [AdminController::class, 'addCountry'])->name('add-country');
  Route::post('admin/add-counties', [AdminController::class, 'addCountryPost'])->name('add-country-post');
  Route::get('admin/edit-country/{id}', [AdminController::class, 'editCountry'])->name('edit-country');
  Route::post('admin/edit-country/{id}', [AdminController::class, 'editCountryPost'])->name('edit-country-post');
  Route::get('admin/delete-country/{id}', [AdminController::class, 'deleteCountry'])->name('delete-country');
});
