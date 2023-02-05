<?php

namespace App\Models;

use App\Models\Candidat;
use App\Models\Referentiel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "duree",
        "referentiel_id",
        "description",
        "isStarted",
        "date_debut",
    ];

    public function referentiel(){
        return $this->belongsTo(Referentiel::class);
    }

    public function candidats()
    {
        return $this->belongsToMany(Candidat::class, 'candidats_formations');
    }
}
