<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PurchaseController;
Route::post('/register', [AuthController::class, 'register'])
->name('api.register');
Route::post('/login', [AuthController::class, 'login'])
->name('api.login');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // للمستخدم العادي
    Route::post('/images/{id}/purchase', [PurchaseController::class, 'store']);
    Route::get('prof/index/{id}', [ProfileController::class, 'show']);
    Route::post('/prof/create/{id}', [ProfileController::class, 'create']);
    Route::get('/images', [ImageController::class, 'index']); 
    Route::post('/upload', [ImageUploadController::class, 'upload']);

    // للأدمن فقط
    Route::middleware('admin')->group(function () {
        Route::get('adminpage', [HomeController::class, 'page']);
        Route::get('prof/index', [ProfileController::class, 'index']); // ⬅ دي للمشرف بس
    });
});

