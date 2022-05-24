<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Filiere;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::all();
        return view("matieres.index", compact("matieres"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view("matieres.create", compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'coefficient' => 'required',
            'filiere_id' => 'required'
        ]);

        $matiere = new Matiere;
        $matiere->titre = $request->input("titre");
        $matiere->coefficient = $request->input("coefficient");
        $matiere->filiere_id = $request->input("filiere_id");
        $matiere->save();

        return redirect('/matieres')->with("success", "La matiere a été ajoutée!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        $matiere = Matiere::find($matiere->id);
        $filieres = Filiere::all();
        return view("matieres.edit", compact('matiere', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
        $data = request()->validate([
            'titre' => 'required',
            'coefficient' => 'required',
            'filiere_id' => 'required'
        ]);
        
        $matiere->update($data);
        
        return redirect('/matieres')->with("success", "La matiere a été modifiée!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        $matiere = Matiere::find($matiere->id);
        $matiere->delete();

        return redirect('/matieres')->with("success", "La matiere a été supprimée!");
    }
}
