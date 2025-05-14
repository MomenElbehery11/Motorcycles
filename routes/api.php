<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProfileController;

Route::post('/register', [AuthController::class, 'register'])
->name('api.register');
Route::post('/login', [AuthController::class, 'login'])
->name('api.login');
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/upload', [ImageUploadController::class, 'upload'])
    ->name('image.upload');

    Route::post('/images/store', [ImageController::class, 'store'])
    ->name('images.store');

    Route::match(['get', 'post'], '/images/{id}/purchase', [ImageController::class, 'purchase'])
    ->name('images.purchase');

    Route::get('prof/index/{id}', [ProfileController::class, 'show'])
    ->name('prof.show');

    Route::get('prof/index', [ProfileController::class, 'index'])
    ->name('prof.index');

    Route::post('/prof/create/{id}', [ProfileController::class, 'create']);


    Route::get('/images', [ImageController::class, 'index']); 
    
    Route::middleware('admin')
    ->get('adminpage', [HomeController::class, 'page'])
    ->name('adminpage');

});

