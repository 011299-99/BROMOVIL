<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistributorController;

// Landing pública (home con secciones)
Route::view('/', 'landing.home')->name('home');

// (Solo si tienes páginas separadas)
Route::view('/esquemas', 'landing.esquemas')->name('schemes');
Route::view('/tienda', 'landing.tienda')->name('store');
Route::view('/faq', 'landing.faq')->name('faq');
Route::view('/testimonios', 'landing.testimonios')->name('testimonials');
Route::view('/mapa', 'landing.mapa')->name('map');
Route::view('/bromovil', 'landing.bromovil')->name('bromovil');

/**
 * Página COMPLETA del formulario de distribuidores
 * (renderiza un layout + incluye el partial del form)
 */
Route::view('/distribuidor', 'landing.distribuidor')->name('distribuidor.form');

/** Submit del formulario */
Route::post('/distribuidor/aplicar', [DistributorController::class, 'apply'])
    ->name('distribuidor.apply');

// Dashboard (requiere login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil (requiere login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

