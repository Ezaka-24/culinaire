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

                <a href="{{ route('recette.create') }}" class="ml-4 m-2">
                Partager une recette
                </a>

                         <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            <i class="fa-duotone fa-regular fa-circle-user"></i>
        
    </button>
</form>
            </div>
        </div>
    </header>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8">

        @foreach($recettes as $recette)
            
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition transform hover:-translate-y-1">
    <img src="{{ asset('storage/' . $recette->photo)}} " alt="{{$recette->titre }}" class="w-full h-48 object-cover rounded mb-4">

    <h2 class="text-xl font-bold mb-1">{{$recette->titre}} </h2>
    <p class="text-gray-600 mb-3">{{$recette->categorie }}</p>
 <!-- Bouton Like -->
      <form method="POST" action="{{ route('recette.like', $recette->id)}}">
    @csrf
   <div class="flex items-center space-x-4 mt-4">
    <!-- Bouton J'aime -->
    <form method="POST" action="{{ route('recette.like', $recette->id)}}">
        @csrf
        <button type="submit" class="like-btn flex items-center space-x-1 text-gray-500 hover:text-red-500 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
            </svg>
            <span>{{$recette->likes->count() }}</span>
        </button>
    </form>

    <!-- Bouton Commentaire -->
     <form action="{{ route('commentaire.store', $recette->id)}}" method="POST">
    @csrf
    <textarea name="contenu" required></textarea>
    <button type="submit" class="comment-btn text-gray-500 hover:text-blue-500 transition duration-300">
        💬 Commenter
    </button>
</form>
    
</div>

                    {{-- Download Link --}}
                    <a href="{{ route('recette.download', $recette->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                        Télécharger
                    </a>
    </div>
</div>
        @endforeach


    </div>

</body>
</html>