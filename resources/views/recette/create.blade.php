 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partager une recette</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body class="bg-indigo-300 to-pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-xl animate-fade-in">
        <h2 class="text-2xl font-bold text-center mb-6 text-yellow-600">Partager votre recette</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('recette.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
 @csrf

            <div>
                <label for="titre" class="block font-semibold">Titre</label>
                <input type="text" name="titre" id="titre" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label for="categorie" class="block font-semibold">Catégorie</label>
                <input type="text" name="categorie" id="categorie" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label for="photo" class="block font-semibold">Photo</label>
                <input type="file" name="photo" id="photo" class="w-full">
            </div>

            <div>
                <label for="ingredients" class="block font-semibold">Ingrédients</label>
                <textarea name="ingredients" id="ingredients" rows="3" class="w-full p-2 border rounded" required></textarea>
            </div>

            <div>
                <label for="preparation" class="block font-semibold">Préparation</label>
                <textarea name="preparation" id="preparation" rows="4" class="w-full p-2 border rounded" required></textarea>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
 Partager la recette
            </button>
        </form>
    </div>

</body>
</html>

