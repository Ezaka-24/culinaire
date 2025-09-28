<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Models\Like; // Si vous utilisez le modèle Like directement
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Recette $recette)
    {
        $like = $recette->likes()->where('user_id', Auth()->id())->first();

        if ($like) {
            $like->delete();
            
        } else {
            $recette->likes()->create(['user_id' => Auth::id()]);
        }

        return back();
    }

    // Si cette méthode 'store' doit exister et faire quelque chose de TRÈS différent
    // que 'toggle', voici la syntaxe corrigée pour créer un like.
    // Mais encore une fois, 'toggle' est généralement suffisant.
    public function store(Recette $recette) // Correction: typage et $ devant la variable
    {
        // Vérifie si l'utilisateur n'a PAS déjà liké cette recette avant de créer
        // pour éviter les doublons si la logique est seulement de "liker"
        if (!$recette->likes()->where('user_id', Auth::id())->exists()) {
             $recette->likes()->create(['user_id' => Auth::id()]);
             return back()->with('success', 'Recette aimée !');
        }

        return back()->with('info', 'Vous avez déjà aimé cette recette.');
    }
}