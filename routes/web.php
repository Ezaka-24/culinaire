<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes accessibles à tous
Route::get('/recettes', [RecetteController::class, 'index'])->name('recette.index');
Route::get('/recette/{id}', [RecetteController::class, 'show'])->name('recette.show');

// Routes nécessitant une authentification
Route::middleware(['auth'])->group(function () {
    Route::get('/recettes/create', [RecetteController::class, 'create'])->name('recette.create');
    Route::post('/recettes', [RecetteController::class, 'store'])->name('recette.store');
    // Si la modification et la suppression nécessitent une authentification
     Route::get('/recette/{id}/edit', [RecetteController::class, 'edit'])->name('recette.edit');
     Route::put('/recette/{id}', [RecetteController::class, 'update'])->name('recette.update');
     Route::delete('/recettes/{id}', [RecetteController::class, 'destroy'])->name('recette.destroy');
     Route::get('/recette/{id}/download', [RecetteController::class, 'download'])->name('recette.download');
     Route::resource('recette', RecetteController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes pour l'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes pour la connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route pour la déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';