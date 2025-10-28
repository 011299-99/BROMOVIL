<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DistributorDashboardController;

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

// (Opcional) Página de “Gracias” tras registro
Route::view('/distribuidor/gracias', 'landing.gracias')->name('distribuidor.gracias');

/*
|--------------------------------------------------------------------------
| Área autenticada
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard general
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Panel del distribuidor (ruta distinta a la del formulario público)
    Route::get('/distribuidor', DistributorDashboardController::class)
        ->name('distributor.dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cambio de contraseña
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password.edit');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

/*
|--------------------------------------------------------------------------
| Carrito
|--------------------------------------------------------------------------
*/
Route::view('/carrito', 'landing.partials.cart')->name('cart');

require __DIR__.'/auth.php';
