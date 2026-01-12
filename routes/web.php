<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Allergen;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/* ============= Visualizaciones publicas ===========*/

/*Visualización HOME*/
Route::get('/', [ProductController::class, 'index'])->name('home');

/*Visualización Detalle producto*/
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');

/*Visualización de TODOS los PRODUCTOS*/
Route::get('/productos', [ProductController::class, 'all'])->name('productos.todos');

/*Visualización del buscador*/
Route::get('/buscar', [ProductController::class, 'search'])->name('productos.buscar');

/*Login*/
// Formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Enviar datos del formulario
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/*========Rutas protegidas========*/

use App\Http\Controllers\ShoppingController;


Route::middleware('auth')->group(function () {

    Route::get('/cesta', [ShoppingController::class, 'index'])->name('cesta.index');
    Route::post('/cesta/add', [ShoppingController::class, 'add'])->name('cesta.add');
    Route::put('/cesta/{cesta}', [ShoppingController::class, 'update'])->name('cesta.update');
    Route::delete('/cesta/{cesta}', [ShoppingController::class, 'destroy'])->name('cesta.destroy');
    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
