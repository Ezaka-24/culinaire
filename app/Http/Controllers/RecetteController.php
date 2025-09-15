<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecetteController extends Controller
{
    /**
     * Le constructeur pour appliquer le middleware d'authentification.
     */
    
    public function construct()
    {
        // Appeler le constructeur de la classe parente
        parent::__construct(); 

        // Appliquer le middleware d'authentification
        $this->middleware('auth')->only(['index', 'create','edit','delete']);
       
    }

    
    /**
     * Affiche la liste des recettes, avec une option de recherche.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    
    
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Utilisation de la méthode when() pour appliquer la recherche si la variable $search est non vide.
        $recettes = Recette::when($search, function ($query) use ($search) {
            $query->where('titre', 'like', "%{$search}%")
                  ->orWhere('categorie', 'like', "%{$search}%");
        })->get();

        return view('recette.index', compact('recettes'));
    }

    
    
    /**
     * Affiche le formulaire pour créer une nouvelle recette.
     * @return \Illuminate\View\View
     */
    
    
    public function create()
    {
        return view('recette.create');
    }

    
    
    /**
     * Enregistre une nouvelle recette dans la base de données.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'preparation' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('recettes', 'public/storage');
        }

        Recette::create($validated);

        return redirect()->route('recette.index')->with('success', 'Recette partagée !');
    }

public function show($id)
{
    $recette = Recette::findOrFail($id);
    
    return view('recette.show', compact('recette'));
}
 
public function download($id)

{
    $recette = Recette::findOrFail($id);

    if ($recette->photo && file_exists(public_path('storage/' . $recette->photo))) 
        return response()->download(public_path('storage/' .$recette->photo));
    

    return redirect()->back()->with('error', 'Fichier non trouvé.');
}
public function destroy($id)
{
$recette = Recette::findOrFail($id);

   // Supprimer l'image si elle existe
if ($recette->photo && Storage::disk('public')->exists($recette->photo)) {
    Storage::disk('public')->delete($recette->photo);
}

$recette->delete();

return redirect()->route('recette.index')->with('success', 'Recette supprimée avec succès.');

}
 /**
     * Formulaire de modification.
     */


    public function edit($id)
    {
        $recette = Recette::findOrFail($id);
        
        return view('recette.edit', compact('recette'));
    }

    /**
     * Mettre à jour une recette.
     */


}

