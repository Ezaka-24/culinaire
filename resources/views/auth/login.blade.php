<!DOCTYPE html>
<html lang="fr">
<head>
    <meta chars
    et="UTF-8">
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

    <body class="bg-gradient-to-r from-yellow-400 via-red-400 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 transform transition duration-700 hover:scale-105">
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-600">Connexion</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <input
                type="email"
                name="email"
                placeholder="Email"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
            />
            <input
                type="password"
                name="password"
                placeholder="Mot de passe"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
            />
            <button
                type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded transition"
            >
                Se connecter
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Pas encore inscrit ?
            <a href="{{ route('register') }}" class="text-yellow-600 font-semibold hover:underline">Créer un compte</a>
        </p>
    </div>

 </body>
 </html>