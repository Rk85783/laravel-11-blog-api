<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [UserAuthController::class, 'login']);
Route::post('signup', [UserAuthController::class, 'signup']);

Route::group(['middleware' => "auth:sanctum"], function () {
    Route::get('/profile', [UserController::class, 'getProfile']);
});

Route::get('login', [UserAuthController::class, 'login'])->name('login');
