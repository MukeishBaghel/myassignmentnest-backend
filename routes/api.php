<?php
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pages', [AdminController::class, 'getPages']);
Route::get('/page/{page_slug}', [AdminController::class, 'getPagesBySlug']);