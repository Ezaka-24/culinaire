<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
 
    
     * Run the migrations.
     */
    public function up(): void // Ajout du type de retour pour PHP 8.0+
    {
        Schema::create('likes', function (Blueprint $table) { // Correction: parenthèses, virgule, et déclaration de la variable $table
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('recette_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Optionnel: Empêche un utilisateur de liker deux fois la même recette
            $table->unique(['user_id', 'recette_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Ajout du type de retour pour PHP 8.0+
    {
        Schema::dropIfExists('likes');
    }
};

