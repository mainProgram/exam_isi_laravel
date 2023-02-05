<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "age",
        "niveau_etude",
        "sexe",
    ];

    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'candidats_formations');
    }
}
