<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('api')->prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class);

    // Additional route for search
    Route::get('users/search/{term}', [UserController::class, 'search']);
});

// Health check endpoint
Route::get('/health', function () {
    return response()->json([
        'status' => 'OK',
        'message' => 'User Management API is running',
        'timestamp' => now()
    ]);
});
