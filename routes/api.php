<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShoppingController;

Route::get('/productos', [ProductController::class, 'index']);
Route::get('/productos/buscar', [ProductController::class, 'search']);
Route::get('/productos/{id}', [ProductController::class, 'show']);

// Cesta
Route::get('/cesta', [ShoppingController::class, 'index']);
Route::post('/cesta', [ShoppingController::class, 'store']);
Route::put('/cesta/{cesta}', [ShoppingController::class, 'update']);
Route::delete('/cesta/{cesta}', [ShoppingController::class, 'destroy']);