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

    <div class="bg-blue-200 text-gray-900 ">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative md:">
                    <img src="image/couverture.jpeg" alt="Photo de couverture 1" class="h-full w-full object-cover filter blur-sm">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center">
                        <h1 class="text-white text-7xl font-bold">Mon Panier Gourmand</h1>
                        <p class="text-4xl text-white">Partagez votre passion culinaire</p>
                    </div>
                </div>

                <div class="swiper-slide relative">
                    <img src="image/olayinka-babalola-r01ZopTiEV8-unsplash.jpg" alt="Photo de couverture 2" class="h-full w-full object-cover filter blur-sm">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center">
                        <h1 class="text-white text-7xl font-bold">Découvrez des saveurs</h1>
                        <p class="text-4xl text-white">Explorez des milliers de recettes</p>
                    </div>
                </div>
                
                <div class="swiper-slide relative">
                    <img src="image/laura-barry-zXNk-1xX5Gw-unsplash (1).jpg" alt="Photo de couverture 3" class="h-full w-full object-cover filter blur-sm">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center">
                        <h1 class="text-white text-7xl font-bold">Rejoignez la communauté</h1>
                        <p class="text-4xl text-white">Partagez vos créations</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="  px-6 text-center mt-8">
            <h2 class="text-3xl font-semibold mb-2">"Bienvenue dans notre communauté culinaire !"</h2>
            <p class="text-xl text-gray-700 mb-4">Découvrez des milliers de recettes, partagez vos créations et rejoignez une communauté passionnée de cuisine.</p>
        </div>

        <div class=" space-x-10 p-4 m-6 text-center">
            <a href="{{ route('recette.index') }}" class="items-center bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded shadow">Voir les recettes</a>
            <a href="{{ route('recette.create') }}" class="items-center bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded shadow">Partager une recette</a>
        </div>

    </div>

    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row justify-between">
                <div>
                    <h2 class="text-3xl font-bold">Mon Panier Gourmand</h2>
                    <p class="mt-2 text-m text-gray-300">Partagez vos meilleures recettes de cuisine.</p>
                </div>
                
                <div class="text-center">
                    <a href="#"><h2 class="text-gray-600 text-2xl font-bold">Mention légales</h2></a>
                    <a href="#"><h2 class="text-gray-600 text-2xl font-bold">Conditions générales</h2></a>
                    <a href="#"><h2 class="text-gray-600 text-2xl font-bold">A propos</h2></a>
                </div>

                <div class="mt-4 md:mt-0">
                    <h2 class="font-semibold text-3xl">Contactez-nous</h2>
                    <ul class="mt-2 space-y-1 text-sm text-gray-400">
                        <li><a href="https://wa.me/+2613759866" target="_blank" class="block my-2 text-green-600 hover:underline">
                            <i class="fab fa-whatsapp"></i> WhatsApp : +261376159866
                        </a></li>
                        <li><a href="https://facebook.com/tonprofil" target="_blank" class="block my-2 text-blue-600 hover:underline">
                            <i class="fab fa-facebook"></i> Facebook:Ezaka Edith
                        </a></li>
                        <li><a href="mailto:priscaedith2@gmail.com" class="block my-2 text-red-500 hover:underline">
                            <i class="fas fa-envelope"></i> Priscaedith2@gmail.com
                        </a></li>
                    </ul>
                </div>
            </div>
            <p class="text-center text-gray-500 mt-6 text-sm">© {{ date('2025') }} Mon Panier Gourmand. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>
</html>