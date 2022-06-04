<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $this->authorize('create', Etudiant::class);
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
        $this->authorize('create', Etudiant::class);
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'age' => 'required',
            'classe_id' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $etudiant = new Etudiant;
        $etudiant->nom = $request->input("nom");
        $etudiant->prenom = $request->input("prenom");
        $etudiant->sexe = $request->input("sexe");
        $etudiant->age = $request->input("age");
        $etudiant->classe_id = $request->input("classe_id");
        $etudiant->email = $request->input("email");
        $etudiant->password = Hash::make($request->input("password"));
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
        $etudiant = Etudiant::find($etudiant->id);
        $this->authorize('view', $etudiant);
        return view("etudiants.show", compact('etudiant'));
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
        $this->authorize('update', $etudiant);
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
        $this->authorize('update', $etudiant);
        $data = request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
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
        $this->authorize('delete', $etudiant);
        $etudiant->user->delete();
        $etudiant->delete();

        return redirect('/etudiants')->with("success", "L'etudiant' a été supprimé!");
    }
}
