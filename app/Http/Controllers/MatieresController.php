<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Filiere;
use App\Models\Enseignant;
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
        $enseignants = Enseignant::all();
        return view("matieres.create", compact('filieres', 'enseignants'));
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
            'annee' => 'required',
            'coefficient' => 'required',
            'nbreSeances' => 'required',
            'dureeSeance' => 'required',
            'dateDebut' => 'required',
            'filiere_id' => 'required',
            'enseignant_id' => 'required'
        ]);

        $matiere = new Matiere;
        $matiere->titre = $request->input("titre");
        $matiere->annee = $request->input("annee");
        $matiere->coefficient = $request->input("coefficient");
        $matiere->nbreSeances = $request->input("nbreSeances");
        $matiere->dureeSeance = $request->input("dureeSeance");
        $matiere->dateDebut = $request->input("dateDebut");
        $matiere->filiere_id = $request->input("filiere_id");
        $matiere->enseignant_id = $request->input("enseignant_id");
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
        $matiere = Matiere::find($matiere->id);
        return view("matieres.show", compact('matiere'));
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
        $enseignants = Enseignant::all();

        $annees = [
            ["3", "3éme année"],
            ["4", "4éme année"],
            ["5", "5éme année"]
        ];

        return view("matieres.edit", compact('matiere', 'filieres', 'enseignants', 'annees'));
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
            // 'annee' => 'required',
            'coefficient' => 'required',
            // 'nbreSeances' => 'required',
            'dureeSeance' => 'required',
            // 'dateDebut' => 'required',
            // 'filiere_id' => 'required',
            'enseignant_id' => 'required'
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

        $seances = $matiere->seances;

        foreach ($seances as $seance) {
            $seance->delete();
        }

        $matiere->delete();

        return redirect('/matieres')->with("success", "La matiere a été supprimée!");
    }
}
