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

                         <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
        Déconnexion
    </button>
</form>
            </div>
        </div>
    </header>
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
 <img src="{{ asset('storage/' . $recette->photo) " alt="Image" class="w-full h-48 object-cover">               
 @endif
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Enregistrer les modifications
            </button>
        </form>
    </div>
</body>
</html>