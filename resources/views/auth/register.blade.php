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

 <body class="bg-gradient-to-r from-pink-500 via-red-400 to-yellow-400 min-h-screen flex items-center justify-center">
 @section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Créer un compte</h2>

        <form method="POST" action="{{ route('register') }}">

            <input
                type="text"
                name="name"
                placeholder="Nom complet"
                value="{{ old('name') }}"
                required
                class="w-full px-4 py-2 m-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
            />
            <input
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                required
                class="w-full px-4 py-2 m-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
            />
            <input
                type="password"
                required
                class="w-full px-4 py-2 m-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
            />
            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirmer le mot de passe"
                required
                class="w-full px-4 py-2 m-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
            />
            <button
                type="submit"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded transition"
            >
                S'inscrire
            </button>
        </form>        <p class="mt-4 text-center text-gray-600">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="text-yellow-600 font-semibold hover:underline">Se connecter</a>
        </p>
    </div>
</div>

</body>
</html>