<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des recettes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
 <body class="bg-yellow-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-xl">
        <h2 class="text-2xl font-bold text-yellow-600 mb-6 text-center">Modifier la recette</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>•{{$error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recette.update', $recette->id)}} " method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold" for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="w-full p-2 border rounded" value="{{old('titre',$recette->titre) }}" required>
            </div>
 <div>
                <label class="block font-semibold" for="categorie">Catégorie</label>
                <input type="text" name="categorie" id="categorie" class="w-full p-2 border rounded" value="{{ old('categorie', $recette->categorie)}}" required>
            </div>

            <div>
                <label class="block font-semibold" for="ingredients">Ingrédients</label>
                <textarea name="ingredients" id="ingredients" rows="3" class="w-full p-2 border rounded" value="{{old('ingredients',$recette->ingredients) }}" required></textarea>
            </div>

            <div>
                <label class="block font-semibold" for="preparation">Préparation</label>
                <textarea name="preparation" id="preparation" rows="4" class="w-full p-2 border rounded" value="{{old('ingredients',$recette->ingredients) }}" required> </textarea>
            </div>

            <div>
                <label class="block font-semibold" for="photo">Changer la photo (optionnel)</label>
                <input type="file" name="photo" id="photo" class="w-full">
                @if($recette->photo)
                    <p class="mt-2 text-sm text-gray-600">Photo actuelle :</p>
 <img src="{{ asset('storage/' . $recette->photo) }}" alt="Photo actuelle" class="w-32 mt-1 rounded shadow">
                @endif
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Enregistrer les modifications
            </button>
        </form>
    </div>
</body>
</html>