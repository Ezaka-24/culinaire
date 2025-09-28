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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id(); // Identifiant unique de l'abonnement

            // Clé étrangère vers la table 'users'
            // Ceci est une bonne pratique si chaque abonnement est lié à un utilisateur.
            // Si un utilisateur peut avoir plusieurs abonnements actifs/inactifs, cette relation est 1-n.
            // Si c'est un abonnement unique par utilisateur, il faudra gérer ça dans la logique applicative ou avec une clé unique.
            $table->foreignId('user_id')
                  ->constrained('users') // Assurez-vous que le nom de la table est 'users'
                  ->onDelete('cascade'); // Si l'utilisateur est supprimé, ses abonnements aussi

            $table->date('date_debut')->nullable(); // Date de début de l'abonnement
            $table->date('date_fin')->nullable();   // Date de fin de l'abonnement

            // Type d'abonnement : gratuit, premium, etc.
            // Utiliser un enum est aussi une bonne option si les types sont fixes.
            $table->string('type')->default('gratuit'); // Valeur par défaut 'gratuit'

            $table->timestamps(); // colonnes created_at et updated_at

            // Optionnel : si un utilisateur ne peut avoir qu'un seul abonnement "actif" à la fois,
            // ou si vous voulez qu'un type d'abonnement soit unique par utilisateur
            // $table->unique(['user_id', 'type']); // Exemple de clé unique combinée
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};