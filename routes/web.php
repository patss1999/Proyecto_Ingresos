<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AuthController;

// GET route to display login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// POST route to process login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// GET route for visitor login form
Route::get('/login-visitante', [AuthController::class, 'showVisitorLoginForm'])->name('login.visitante');

// POST route to process visitor login
Route::post('/login-visitante', [AuthController::class, 'loginVisitante'])->name('login.visitante.process');

// -----------------------------
// Recuperar contraseña
// -----------------------------
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->name('verification.notice');

// -----------------------------
// Rutas protegidas con autenticación
// -----------------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard inicial después del login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUDs
    Route::resource('users', UserController::class);
    Route::resource('visitantes', VisitanteController::class);
    Route::resource('articulos', ArticuloController::class);
    Route::resource('roles', RolController::class);
    Route::resource('reportes', ReporteController::class);
});
