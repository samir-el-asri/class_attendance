<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Classe;
use App\Models\Matiere;
use Illuminate\Http\Request;

class FilieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view("filieres.index", compact("filieres"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Filiere::class);
        return view("filieres.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Filiere::class);
        $this->validate($request, [
            'titre' => 'required',
            'abbreviation' => 'required'
        ]);

        $filiere = new Filiere;
        $filiere->titre = $request->input("titre");
        $filiere->abbreviation = $request->input("abbreviation");
        $filiere->save();

        return redirect('/filieres')->with("success", "La filiere a été ajoutée!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(Filiere $filiere)
    {
        $filiere = Filiere::find($filiere->id);
        $this->authorize('view', $filiere);
        return view("filieres.show", compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        $filiere = Filiere::find($filiere->id);
        $this->authorize('update', $filiere);
        return view("filieres.edit", compact("filiere"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        $this->authorize('update', $filiere);
        $data = request()->validate([
            'titre' => 'required',
            'abbreviation' => 'required'
        ]);
        
        $filiere->update($data);
        
        return redirect('/filieres')->with("success", "La filiere a été modifiée!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiere $filiere)
    {
        $filiere = Filiere::find($filiere->id);
        $this->authorize('delete', $filiere);
        $filiere->delete();

        return redirect('/filieres')->with("success", "La filiere a été supprimée!");
    }
}
