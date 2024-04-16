<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('users', [UserController::class, 'getAll'])->middleware('permission:get_users');
    Route::get('users/{id}', [UserController::class, 'getById'])->middleware('permission:get_users_by_id');
    Route::post('users', [UserController::class, 'store'])->middleware('permission:post_store_users');
    Route::put('users/{id}', [UserController::class, 'update'])->middleware('permission:put_update_users');
    Route::delete('users/{id}', [UserController::class, 'delete'])->middleware('permission:delete_users');

    Route::get('products', [ProductController::class, 'getAll'])->middleware('permission:get_products');
    Route::get('products/{id}', [ProductController::class, 'getById'])->middleware('permission:get_products_by_id');
    Route::post('products', [ProductController::class, 'store'])->middleware('permission:post_store_products');
    Route::put('products/{id}', [ProductController::class, 'update'])->middleware('permission:put_update_products');
    Route::delete('products/{id}', [ProductController::class, 'delete'])->middleware('permission:delete_products');

    Route::post('logout', [UserController::class, 'logout']);
});





