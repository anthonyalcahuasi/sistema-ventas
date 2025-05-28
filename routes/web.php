<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas de autenticación (Laravel Breeze/Fortify)
require __DIR__.'/auth.php';

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Cotizaciones (ver, crear, aceptar)
    Route::resource('quotations', QuotationController::class)->middleware('role:admin|vendedor');
    Route::post('/quotations/{quotation}/accept', [QuotationController::class, 'accept'])->name('quotations.accept');

    // Módulos principales para administradores y vendedores
    Route::middleware(['role:admin|vendedor'])->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('sales', SaleController::class);
    });

    // Gestión de usuarios solo para administrador
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);

        // Rutas adicionales para editar usuarios fuera del resource si es necesario
        Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
        Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');

        // Ruta de prueba para validación de rol
        Route::get('/test-role', function () {
            return 'Acceso concedido solo para admins';
        });
    });
    
});

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});


