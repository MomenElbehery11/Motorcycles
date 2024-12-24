<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/adminpage',[HomeController::class,'page'])->middleware('admin')->name('adminpage');

Route::get('/upload', [ImageUploadController::class, 'index'])->name('image.form');
Route::post('/upload', [ImageUploadController::class, 'upload'])->name('image.upload');

Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');

Route::match(['get', 'post'], '/images/{id}/purchase', [ImageController::class, 'purchase'])->name('images.purchase');

Route::get('prof/create/{id}', [UserController::class, 'create'])->name('prof.create');
Route::get('prof/index/{id}', [UserController::class, 'index'])->name('prof.index');
Route::post('prof/store/{userId}/{imageId}', [UserController::class, 'store'])->name('prof.store');
