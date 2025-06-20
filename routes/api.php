<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;

// ...existing code...

// Publicly accessible login route
Route::post('/login', [AuthController::class, 'login']);
// If you have a registration route, it would also be public
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']); // Logout should be protected
    Route::apiResource('images', App\Http\Controllers\API\ImageController::class)->only([
        'index', 'store', 'destroy'
    ]);
});
