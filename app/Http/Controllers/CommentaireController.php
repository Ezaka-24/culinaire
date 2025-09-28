<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store($Requestrequest,$recetteId)
{
    // Validation
    $request->validate([
        'contenu' => 'required|string|max:1000',
    ]);

    // Création du commentaire
    Commentaire::create([
        'user_id' => auth()->id(),
        'recette_id' =>recetteId,
        'contenu' => $request->contenu,
    ]);

    return back();
}


}
