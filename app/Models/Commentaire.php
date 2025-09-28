<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //
    protected 
    $fillable = ['user_id', 'recette_id', 'contenu'];
}
