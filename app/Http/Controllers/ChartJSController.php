<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartJSController extends Controller
{
    public function index(){
        $candidats_par_formation =  DB::table('candidats', "c")
        ->join('candidats_formations as cf', 'cf.candidat_id', '=', 'c.id')
        ->join('formations as f', 'f.id', '=', 'cf.formation_id')
        ->select('f.nom')
        ->selectRaw('count(*) effectif')
        ->groupBy("f.nom")
        ->pluck('effectif', 'nom');
        $labels_can_par_form = $candidats_par_formation->keys();
        $effectif_can_par_form = $candidats_par_formation->values();

        $formation_par_referentiel =  DB::table('formations', "f")
        ->join('referentiels as r', 'r.id', '=', 'f.referentiel_id')
        ->select('r.libelle')
        ->selectRaw('count(*) effectif')
        ->groupBy("r.libelle")
        ->pluck('effectif', 'libelle');
        $labels_form_par_ref = $formation_par_referentiel->keys();
        $effectif_form_par_ref = $formation_par_referentiel->values();

        $candidats_par_sexe = DB::table('candidats', "c")
        ->select("c.sexe")
        ->selectRaw('count(*) effectif')
        ->groupBy("c.sexe")
        ->pluck('effectif', 'sexe');
        $labels_can_par_sexe = $candidats_par_sexe->keys();
        $effectif_can_par_sexe = $candidats_par_sexe->values();
        
        
        $referentiels_par_type =  DB::table('referentiels', "r")
        ->join('types as t', 't.id', '=', 'r.type_id')
        ->select('t.libelle')
        ->selectRaw('count(*) effectif')
        ->groupBy("t.libelle")
        ->pluck('effectif', 'libelle');
        $labels_ref_par_type = $referentiels_par_type->keys();
        $effectif_ref_par_type = $referentiels_par_type->values();

        $candidats_par_age = DB::table('candidats', "c")
        ->select("c.age")
        ->selectRaw('count(*) effectif')
        ->groupBy("c.age")
        ->pluck('effectif', 'age');
        $labels_can_par_age = $candidats_par_age->keys();
        $effectif_can_par_age = $candidats_par_age->values();

        $formation_par_etat =  DB::table('formations', "f")
        ->select('f.isStarted')
        ->selectRaw('count(*) effectif')
        ->groupBy("f.isStarted")
        ->pluck('effectif', 'isStarted');
        $labels_form_par_etat =["En attente", "En cours"];
        $effectif_form_par_etat = $formation_par_etat->values();     
        
        return view('welcome', compact(
            'effectif_can_par_sexe', 
            'labels_can_par_sexe',
            'effectif_can_par_age', 
            'labels_can_par_age',
            'effectif_can_par_form', 
            'labels_can_par_form',
            'effectif_ref_par_type',
            'labels_ref_par_type',
            'effectif_form_par_etat',
            'labels_form_par_etat',
            'effectif_form_par_ref',
            'labels_form_par_ref',
        ));
    }
}
