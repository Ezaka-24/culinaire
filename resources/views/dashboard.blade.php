<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        /* Custom Tailwind CSS classes for a similar look to the React Native styles */
        @layer components {
            .container {
                @apply flex flex-col min-h-screen bg-gray-50 text-gray-800;
            }
            .content {
                @apply flex-1 p-6;
            }
            .title {
                @apply text-3xl font-bold text-center text-gray-800 mb-2;
            }
            .subtitle {
                @apply text-xl font-semibold mb-4 text-gray-700;
            }
            .text-light {
                @apply text-gray-500;
            }
            .card {
                @apply bg-white rounded-xl shadow-lg p-6 flex-1 flex flex-col;
            }
            .btn-primary {
                @apply w-full py-4 px-6 rounded-lg bg-red-500 text-white font-semibold text-center transition-colors duration-200 hover:bg-red-600;
            }
            .icon {
                /* Placeholder styles for icons */
                @apply w-5 h-5;
            }
        }
    </style>
</head>
<body class="container">
    <main class="content">
        <header class="flex items-center mb-8">
            <a href="#" class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20z"/></svg>
            </a>
            <h1 class="title text-left flex-1">
                Choisir un abonnement
            </h1>
        </header>

        <section class="card mb-6">
            <h2 class="subtitle text-center mb-4">
                Pourquoi s'abonner ?
            </h2>
            <div class="space-y-3">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19