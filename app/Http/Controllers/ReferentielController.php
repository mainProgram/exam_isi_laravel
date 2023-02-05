<?php

namespace App\Http\Controllers;

use App\Models\Referentiel;
use App\Http\Requests\StoreReferentielRequest;
use App\Http\Requests\UpdateReferentielRequest;
use App\Models\Type;

class ReferentielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $referentiels = Referentiel::paginate(10);
        return view("pages.referentiels.index", [
            "referentiels" => $referentiels,
            "types" => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view("pages.referentiels.create", [
            "types" => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReferentielRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferentielRequest $request)
    {
        $referentiel = Referentiel::create($request->validated());
        $referentiel->type()->associate(Type::find($request->type_id));
        $referentiel->save();
        return back()->with('success', 'Le réferentiel '. $referentiel->nom .' a été créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function show(Referentiel $referentiel)
    {
        $types = Type::all();
        return view("pages.referentiels.show", [
            "referentiel" => $referentiel,
            "types" => $types
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referentiel = Referentiel::find($id);
        return response()->json($referentiel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReferentielRequest  $request
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferentielRequest $request, Referentiel $referentiel)
    {
        $referentiel->type()->associate(Type::find($request->type_id));
        $referentiel->save();        
        $referentiel->update($request->validated());        
        return back()->with('success', 'Le référentiel a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referentiel  $referentiel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referentiel $referentiel)
    {
        $referentiel->delete();
        return response()->json(["status" => "Référentiel supprimé !"]);
    }
}
