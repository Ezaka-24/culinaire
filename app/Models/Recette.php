<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    // app/Models/Recette.php

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titre', // <-- Add 'titre' here
        'categorie',
        'ingredients',
        'preparation',
        'photo',//recuperer le photo dans storage.
    ];

    public function likes()
{
    return $this->hasMany(Like::class);
}

public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

}