<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commentaires', function (Blueprint $table) { // Correction de la syntaxe ici
            $table->id();

            // Clé étrangère vers la table 'recettes'
            $table->foreignId('recette_id')
                  ->constrained('recettes') // Assurez-vous que le nom de la table est correct
                  ->onDelete('cascade');

            // Clé étrangère vers la table 'users'
            $table->foreignId('user_id')
                  ->constrained('users') // Assurez-vous que le nom de la table est correct
                  ->onDelete('cascade');

            // Contenu du commentaire
            $table->text('contenu'); // Texte pour le contenu du commentaire

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};