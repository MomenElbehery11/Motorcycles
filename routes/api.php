<?php
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::post('/information/{id}',[AuthController::class,'information']);

//https://documenter.getpostman.com/view/35788196/2sA3XQh2Rq
