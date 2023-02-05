<?php

namespace App\Models;

use App\Models\Referentiel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
    ];

    public function referentiels(){
        return $this->hasMany(Referentiel::class, 'type_id');
    }
}
