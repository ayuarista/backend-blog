<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/debug-api', function () {
    return response()->json(['message' => 'API route working']);
});

// Public API routes
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{slug}', [PostController::class, 'show']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{slug}', [CategoryController::class, 'show']);
Route::get('categories/{slug}/posts', [CategoryController::class, 'posts']);

// Atau pakai API Resource (lebih clean)
// Route::apiResource('posts', PostController::class)->only(['index', 'show']);
// Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);