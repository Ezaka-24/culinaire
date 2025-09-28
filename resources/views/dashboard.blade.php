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

<body class="bg-indigo-300 bg-center min-h-screen">
    <header class="bg-yellow-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-3xl font-bold">Mon Panier Gourmand</h1>

            <div class="flex items-center justify-between w-full md:w-auto mt-4 md:mt-0 space-x-4">
                <form action="{{ route('recette.index') }}" method="GET" class="flex flex-grow md:flex-none">
                    <input type="text" name="search" placeholder="Rechercher une recette..."
                        class="text-black text-center px-4 py-2 border rounded-l-md w-full md:w-80 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-r-md hover:bg-yellow-600">
                        Rechercher
                    </button>
                </form>
<div>
                <a href="{{ route('register') }}">
                    <i class="fa-solid fa-user bg-green-500 p-3 rounded-full hover:bg-green-600"></i>
                </a>
                </div>

   <div>             
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-white bg-red-500 px-4 py-2 rounded hover:bg-red-600">
        Déconnexion
    </button>
</form>
</div>
            </div>
        </div>
    </header>

    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6 text-yellow-600">
            Bienvenue {{ Auth::user()->name }} 👋
        </h1>

        <div class="bg-white shadow rounded p-6 mb-6">
            <p class="text-xl">Vous avez <strong>{{ $recettes->count() }}</strong> recette(s) partagée(s).</p>
            <a href="{{ route('recette.create') }}" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Partager une recette
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($recettes as $recette)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold mb-2">{{ $recette->titre }}</h2>
                    <p class="text-sm text-gray-500">{{ $recette->categorie }}</p>

                    @if ($recette->photo)
                        <img src="{{ asset('storage/' . $recette->photo) }}" alt="photo" class="w-full h-40 object-cover rounded my-2">
                    @endif
                    
                    <div class="flex justify-between mt-2">
                        <a href="{{ route('recette.edit', $recette->id) }}" class="text-blue-500">Modifier</a>

                        <form action="{{ route('recette.destroy', $recette->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>