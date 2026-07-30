<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/productosJSON', [ProductController::class, 'apiProductos']);