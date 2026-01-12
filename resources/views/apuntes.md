Route::middleware('auth')->group(function () {

    
    Route::get('/cesta', [ShoppingController::class, 'index'])->name('cesta.index');
    Route::post('/cesta/add', [ShoppingController::class, 'add'])->name('cesta.add');
    Route::post('/cesta/{cesta}', [ShoppingController::class, 'update'])->name('cesta.update');
    Route::delete('/cesta/{cesta}', [ShoppingController::class, 'destroy'])->name('cesta.destroy');
    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
