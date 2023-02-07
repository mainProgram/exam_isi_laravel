<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Http\Requests\StoreCandidatRequest;
use App\Http\Requests\UpdateCandidatRequest;
use App\Models\Formation;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats = Candidat::with('formations')->paginate(10);
        $formations = Formation::all();
        return view("pages.candidats.index", [
            "candidats" => $candidats,
            "formations" => $formations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = Formation::all();
        return view("pages.candidats.create", [
            "formations" => $formations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidatRequest $request)
    {
        $candidat = Candidat::create($request->validated());
        $candidat->formations()->attach($request->formation_id);
        return back()->with('success', 'Le candidat '. $candidat->prenom. " ". $candidat->nom  .' a été enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show(Candidat $candidat)
    {
        return view("pages.candidats.show", [
            "candidat" => $candidat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidat $candidat)
    {
        $formations = Formation::all();
        return view("pages.candidats.edit", [
            "candidat" => $candidat,
            "formations" => $formations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidatRequest  $request
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidatRequest $request, Candidat $candidat)
    {
        $candidat->update($request->validated());        
        $candidat->formations()->syncWithoutDetaching($request->formation_id);
        return back()->with('success', 'Le candidat a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidat $candidat)
    {
        $candidat->formations()->detach();
        $candidat->delete();
        return response()->json(["status" => "Candidat supprimé !"]);
    }
}
