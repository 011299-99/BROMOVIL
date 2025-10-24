<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistributorController;

// Landing pública
Route::view('/', 'landing.home')->name('home');
Route::view('/esquemas', 'landing.esquemas')->name('schemes');
Route::view('/tienda', 'landing.tienda')->name('store');
Route::view('/faq', 'landing.faq')->name('faq');
Route::view('/testimonios', 'landing.testimonios')->name('testimonials');
Route::view('/mapa', 'landing.mapa')->name('map');
Route::view('/bromovil', 'landing.bromovil')->name('bromovil');

// Página completa del formulario + submit
Route::view('/distribuidor', 'landing.distribuidor')->name('distribuidor.form');
Route::post('/distribuidor/aplicar', [DistributorController::class, 'apply'])
    ->name('distribuidor.apply');

// Dashboard (requiere email verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Página del carrito
Route::view('/carrito', 'landing.partials.cart')->name('cart');



// Rutas protegidas (perfil + cambio de contraseña)
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    // Cambio de contraseña
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password.edit');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

require __DIR__.'/auth.php';
