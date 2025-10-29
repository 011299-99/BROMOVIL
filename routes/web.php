<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DistributorDashboardController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Landing pública
|--------------------------------------------------------------------------
*/
Route::view('/', 'landing.home')->name('home');
Route::view('/esquemas', 'landing.esquemas')->name('schemes');
Route::view('/tienda', 'landing.tienda')->name('store');
Route::view('/faq', 'landing.faq')->name('faq');
Route::view('/testimonios', 'landing.testimonios')->name('testimonials');
Route::view('/mapa', 'landing.mapa')->name('map');
Route::view('/bromovil', 'landing.bromovil')->name('bromovil');

/*
|--------------------------------------------------------------------------
| Distribuidor: formulario público (GET/POST) 
|--------------------------------------------------------------------------
*/
Route::view('/distribuidor/solicitud', 'landing.distribuidor')->name('distribuidor.form');
Route::post('/distribuidor/aplicar', [DistributorController::class, 'apply'])->name('distribuidor.apply');
Route::view('/distribuidor/gracias', 'landing.gracias')->name('distribuidor.gracias');

/*
|--------------------------------------------------------------------------
| Área autenticada (auth + verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Panel del distribuidor
    Route::get('/distribuidor', DistributorDashboardController::class)->name('distributor.dashboard');

    // Carrito (TODAS estas rutas autenticadas)
    Route::get('/carrito', [CartController::class, 'show'])->name('cart.index');
    Route::post('/carrito/agregar', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/carrito/item/{item}/qty', [CartController::class, 'updateQty'])->name('cart.item.qty');
    Route::delete('/carrito/item/{item}', [CartController::class, 'remove'])->name('cart.item.remove');
    Route::delete('/carrito/vaciar', [CartController::class, 'empty'])->name('cart.empty');
    Route::post('/carrito/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cambio de contraseña
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password.edit');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

require __DIR__.'/auth.php';
