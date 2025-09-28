<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importer la façade Auth

class AbonnementController extends Controller
{
    // Appliquer le middleware 'auth' à toutes les méthodes de ce contrôleur
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Retourne la vue pour gérer l'abonnement (par exemple, pour afficher un bouton d'activation)
        return view('abonnement.index');
    }

    public function activer(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user(); // Utilisation de Auth::user() pour plus de clarté

        // Vérifier si l'utilisateur existe (même si le middleware 'auth' devrait déjà le garantir)
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour activer un abonnement.');
        }

        // Mettre à jour la colonne 'is_subscribed' de l'utilisateur à true
        // Le nom de la colonne est 'is_subscribed', pas 'abonne'
        $user->is_subscribed = true;
        $user->save(); // Enregistrer les modifications dans la base de données

        // Rediriger avec un message de succès
        return redirect()->route('recette.index')->with('success', 'Abonnement activé avec succès !');
    }

    // Vous pourriez ajouter une méthode pour désactiver l'abonnement
    public function desactiver(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer un abonnement.');
        }

        $user->is_subscribed = false;
        $user->save();
       $abonnement = auth()->user()->abonnement;
       {
return view('nom_de_ta_vue', compact('abonnement'));
       }
        return redirect()->route('recette.index')->with('success', 'Abonnement désactivé avec succès !');
    }

    
}