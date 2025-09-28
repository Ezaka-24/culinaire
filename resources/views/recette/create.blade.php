<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Panier Gourmand')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        /* Styles personnalisés pour le slider si nécessaire sur d'autres pages */
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

<body class="bg-indigo-300 bg-center min-h-screen ">

    <header class="bg-yellow-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-3xl font-bold">Mon Panier Gourmand</h1>

            <div class="flex items-center justify-between w-full md:w-auto mt-4 md:mt-0 space-x-4">
                {{-- Formulaire de recherche --}}
                <form action="{{ route('recette.index') }}" method="GET" class="flex flex-grow md:flex-none">
                    <input type="text" name="search" placeholder="Rechercher une recette..."
                        class="text-black text-center px-4 py-2 border rounded-l-md w-full md:w-80 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-r-md hover:bg-yellow-600">
                        Rechercher
                    </button>
                </form>

                {{-- Liens d'authentification / Déconnexion --}}
                @guest
                    <a href="{{ route('register') }}" class="ml-4">
                        <i class="fa-solid fa-user bg-green-500 p-3 rounded-full hover:bg-green-600"></i>
                    </a>
                    <a href="{{ route('login') }}" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Connexion
                    </a>
                @endguest

                @auth
                    {{-- Nom de l'utilisateur connecté --}}
                    <span class="ml-4 text-white">Bonjour, {{ Auth::user()->name }}</span>

                    {{-- Lien vers le tableau de bord --}}
                    <a href="{{ route('dashboard') }}" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                        Dashboard
                    </a>
                    
                    {{-- Formulaire de déconnexion --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            <i class="fa-duotone fa-regular fa-circle-user"></i>

                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    {{-- C'est ici que le contenu spécifique des vues enfant sera inséré --}}
    <main class="container mx-auto py-8">
        @yield('content') {{-- POINT D'INSERTION CORRECT --}}
    </main>

     <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-yellow-600 text-center">Partager votre recette</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>-{{$error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('recette.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
 <label for="titre" class="block font-semibold mb-1">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="categorie" class="block font-semibold mb-1">Catégorie</label>
                <input type="text" name="categorie" id="categorie" value="{{ old('categorie') }}" required
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="photo" class="block font-semibold mb-1">Photo (optionnel)</label>
                <input type="file" name="photo" id="photo" accept="image/jpg*"
                       class="w-full">
            </div>

            <div>
                <label for="ingredients" class="block font-semibold mb-1">Ingrédients</label>
                <textarea name="ingredients" id="ingredients" rows="3" required
                          class="w-full border rounded px-3 py-2">{{ old('ingredients') }}</textarea>
            </div>

            <div>
                <label for="preparation" class="block font-semibold mb-1">Préparation</label>
 <textarea name="preparation" id="preparation" rows="4" required
                          class="w-full border rounded px-3 py-2">{{ old('preparation') }}</textarea>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition">
                <i class="fa-solid fa-regular fa-share"></i>
            </button>
        </form>

    </div>

</body>
</html>