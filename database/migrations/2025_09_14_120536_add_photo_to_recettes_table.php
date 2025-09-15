<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recettes', function (Blueprint $table) {
            // Assuming 'photo' comes after 'preparation'
            $table->text('photo')->after('preparation');
        });
    }

    public function down(): void
    {
        Schema::table('recettes', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};