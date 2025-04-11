<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);      // List all products
    Route::post('/', [ProductController::class, 'store']);     // Create a new product
    Route::get('{id}', [ProductController::class, 'show']);    // Show a specific product
    Route::put('{id}', [ProductController::class, 'update']);  // Update a specific product
    Route::delete('{id}', [ProductController::class, 'destroy']); // Delete a specific product
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);     // List all categories
    Route::post('/', [CategoryController::class, 'store']);    // Create a new category
    Route::get('{id}', [CategoryController::class, 'show']);   // Show a specific category
    Route::put('{id}', [CategoryController::class, 'update']); // Update a specific category
    Route::delete('{id}', [CategoryController::class, 'destroy']); // Delete a specific category
});
