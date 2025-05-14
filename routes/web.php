<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::get('/upload', [ImageUploadController::class, 'index'])
    ->middleware('auth')
    ->name('image.form');

Route::post('/upload', [ImageUploadController::class, 'upload'])
    ->middleware('auth')
    ->name('image.upload');

Route::middleware('auth:sanctum')->group(function () {
    // عرض كل الصور
    Route::get('/images', [ImageController::class, 'index'])
        ->name('images.index');

    // إنشاء صورة جديدة
    Route::get('images/create', [ImageController::class, 'create'])
        ->name('images.create');

    // حفظ الصورة الجديدة
    Route::post('/images', [ImageController::class, 'store'])
        ->name('images.store');

    // شراء صورة
    Route::match(['get', 'post'], '/images/{id}/purchase', [ImageController::class, 'purchase'])
        ->name('images.purchase');

    // عرض بروفايل المستخدم
    Route::get('prof/index/{id}', [ProfileController::class, 'index'])
        ->name('prof.index');
});

Route::get('/prof/create/{id}', [ProfileController::class, 'create'])
    ->middleware('auth') // مهم جداً
    ->name('prof.create');

Route::post('/prof/store/{id}', [ProfileController::class, 'storeProf'])
->name('prof.store')->middleware('auth');


    Route::get('adminpage', [HomeController::class, 'page'])
    ->middleware('admin')
    ->name('adminpage');