<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referentiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'horaire',
        'type_id',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function formations(){
        return $this->hasMany(Formation::class, 'referentiel_id');
    }
}
