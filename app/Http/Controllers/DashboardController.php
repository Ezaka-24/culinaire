<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /// Dans un contrôleur qui gère le dashboard, par exemple DashboardController.php

public function index()
{
    // Récupère les recettes de l'utilisateur connecté
    $recettes = Auth::user()->recettes;

    return view('dashboard', compact('recettes'));
}
}
