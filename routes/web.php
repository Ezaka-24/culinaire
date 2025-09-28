<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\AbonnementController;




Route::get('/', function () {
    return view('welcome');
});

// Routes accessibles à tous
Route::get('/recettes', [RecetteController::class, 'index'])->name('recette.index');
Route::get('/recette/{id}', [RecetteController::class, 'show'])->name('recette.show');




// Routes nécessitant une authentification
Route::middleware(['auth'])->group(function () 
{

    Route::get('/recettes/create', [RecetteController::class, 'create'])->name('recette.create');

    Route::post('/recettes', [RecetteController::class, 'store'])->name('recette.store');

    // Si la modification et la suppression nécessitent une authentification
    Route::get('/recette/{id}/edit', [RecetteController::class, 'edit'])->name('recette.edit');
    
    Route::put('/recette/{id}', [RecetteController::class, 'update'])->name('recette.update');
    
    Route::delete('/recettes/{id}', [RecetteController::class, 'destroy'])->name('recette.destroy');
    
    Route::get('/recette/{id}/download', [RecetteController::class, 'download'])->name('recette.download');
    
    
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
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', [RecetteController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/recettes/{recette}/like', [LikeController::class, 'store'])->name('recette.like');
Route::post('/recettes/{recette}/commentaire', [CommentaireController::class, 'store'])->name('commentaire.store');

// Groupe de routes pour l'abonnement, toutes protégées par le middleware 'auth'
Route::middleware('auth')->group(function () {
    // Affiche la page de gestion de l'abonnement
    Route::get('/abonnement', [AbonnementController::class, 'index'])->name('abonnement.index'); // Nom de route corrigé et unique
    
    // Traite l'activation de l'abonnement
    Route::post('/abonnement/activer', [AbonnementController::class, 'activer'])->name('abonnement.activer'); // Utilise une route différente pour l'action POST

    // Traite la désactivation de l'abonnement (ajouté pour une gestion complète)
    Route::post('/abonnement/desactiver', [AbonnementController::class, 'desactiver'])->name('abonnement.desactiver');
});

require __DIR__.'/auth.php';