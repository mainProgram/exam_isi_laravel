<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Referentiel;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referentiels = Referentiel::all();
        $formations = Formation::paginate(10);
        return view("pages.formations.index", [
            "formations" => $formations,
            "referentiels" => $referentiels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referentiels = Referentiel::all();
        return view("pages.formations.create", [
            "referentiels" => $referentiels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormationRequest $request)
    {
        $formation = Formation::create($request->validated());
        $formation->referentiel()->associate(Referentiel::find($request->referentiel_id));
        $formation->save();
        return back()->with('success', 'La formation '. $formation->nom .' a été créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        $referentiels = Referentiel::all();
        return view("pages.formations.edit", [
            "formation" => $formation,
            "referentiels" => $referentiels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormationRequest  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormationRequest $request, Formation $formation)
    {
        $formation->referentiel()->associate(Referentiel::find($request->referentiel_id));
        // $formation->save();        
        $formation->update($request->validated());        
        return back()->with('success', 'La formation a été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return response()->json(["status" => "Formation supprimée !"]);
    }
}
