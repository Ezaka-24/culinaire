<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue | Mon site de recettes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        /* Styles personnalisés pour le slider */
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            height: 100vh;
        }
        .swiper-pagination-bullet-active {
            background: #f59e0b; /* Couleur de la pagination active */
        }
    </style>
</head>

<body class="bg-indigo-300 bg-center min-h-screen" >

    <header class="bg-yellow-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-3xl font-bold">Mon Panier Gourmand</h1>

            <div class="flex items-center justify-between w-full md:w-auto mt-4 md:mt-0">
                <form action="{{ route('recette.index') }}" method="GET" class="flex flex-grow md:flex-none">
                    <input type="text" name="search" placeholder="Rechercher une recette..."
                        class="text-black text-center px-4 py-2 border rounded-l-md w-full md:w-80 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-r-md hover:bg-yellow-600">
                        Rechercher
                    </button>
                </form>

                <a href="{{ route('register') }}" class="ml-4">
                    <i class="fa-solid fa-user bg-green-500 p-3 rounded-full hover:bg-green-600"></i>
                </a>
            </div>
        </div>
    </header>

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
    <form method="POST" action="{{ route('recette.like', $recette->id) ">
    @csrf
    <button type="submit">
        {{❤️recette->likes->count() }}
    </button>
</form>
<form action="{{ route('commentaire.store', recette->id)}}" method="POST">
    @csrf
    <textarea name="contenu" required class="w-full p-2 border rounded mb-2" placeholder="Votre commentaire..."></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Commenter
    </button>
</form>
    
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