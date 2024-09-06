<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return ['name' => "Rohit Kumar Mahor", 'channel' => "Mr. Kumar - Coding"];
});

Route::get('students', [StudentController::class, 'list']);
Route::post('add-student', [StudentController::class, 'addStudent']);