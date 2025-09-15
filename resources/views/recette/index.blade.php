<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des recettes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-yellow-100 to-pink-100 min-h-screen flex items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8">

        @foreach($recettes as $recette)
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition transform hover:-translate-y-1">
                <h2 class="text-xl font-bold">{{ $recette->titre }}</h2>
                <p class="mb-2 text-gray-600">{{ $recette->categorie }}</p>

                <div class="flex space-x-2 mt-4">
                    <a href="{{ route('recette.edit', $recette->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                        Modifier
                    </a>
                    <form action="{{route('recette.destroy',$recette->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
</form>

                    {{-- Utilise la route 'recette.download' pour appeler la méthode du contrôleur --}}
                    <a href="{{ route('recette.download', $recette->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
    Télécharger
</a>
                </div>
            </div>
        @endforeach

        <img src="{{ asset('storage/' . recette->photo) " alt="Photo de la recette" class="w-full h-48 object-cover rounded">


    </div>
</body>
</html>