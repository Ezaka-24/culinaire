<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $recette->titre }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-yellow-100 to-pink-100 min-h-screen py-10">

    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold text-yellow-600 mb-4">{{ $recette->titre }}</h1>
        <p class="text-sm text-gray-500 mb-2">Catégorie : {{ $recette->categorie }} </p>

        @if ($recette->photo)
            {{-- Corrected image path and alt attribute --}}
            <img src="{{ asset('storage/' . $recette->photo) }}" alt="Photo de {{ $recette->titre }}" class="w-full h-64 object-cover my-4">
        @endif

        <div class="mb-4">
            {{-- Corrected heading. The title is already the main heading. --}}
            <h2 class="text-xl font-semibold">Titre</h2>
            <p class="text-gray-700">{{ $recette->titre }}</p>

            <h2 class="text-xl font-semibold">Ingrédients</h2>
            <p class="text-gray-700">{{ $recette->ingredients }}</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold">Préparation</h2>
            <p class="text-gray-700">{{ $recette->preparation }}</p>
        </div>
    </div>
    
    {{-- Delete form is correct as previously established --}}
    <form action="{{ route('recette.destroy', $recette->id) }}" method="POST">
        @csrf
        @method('DELETE') 

        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mt-4">
            Supprimer la recette
        </button>
    </form>

</body>
</html>