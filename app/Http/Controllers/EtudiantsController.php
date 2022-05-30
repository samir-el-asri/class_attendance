<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view("etudiants.index", compact("etudiants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view("etudiants.create", compact("classes"));
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
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'classe_id' => 'required'
        ]);

        $etudiant = new Etudiant;
        $etudiant->nom = $request->input("nom");
        $etudiant->prenom = $request->input("prenom");
        $etudiant->age = $request->input("age");
        $etudiant->classe_id = $request->input("classe_id");
        $etudiant->save();

        return redirect('/etudiants')->with("success", "L'étudiant a été ajouté!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $etudiant = Etudiant::find($etudiant->id);

        $classes = Classe::all();
        $newClasses = [];
        foreach ($classes as $classe) {
            $nom = $classe->annee.$classe->filiere->abbreviation."-".$classe->groupe;
            array_push($newClasses, ["id"=>$classe->id, "nom"=>$nom]);
        }
        $classes = $newClasses;

        return view("etudiants.edit", compact("etudiant", "classes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $data = request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'classe_id' => 'required'
        ]);
        
        $etudiant->update($data);
        
        return redirect('/etudiants')->with("success", "L'étudiant a été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant = Etudiant::find($etudiant->id);
        $etudiant->delete();

        return redirect('/etudiants')->with("success", "L'etudiant' a été supprimé!");
    }
}
