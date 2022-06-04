<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnseignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        return view("enseignants.index", compact("enseignants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Enseignant::class);
        return view("enseignants.create");
    }

    /**
     * Store a newly created resource in storprenom.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Enseignant::class);

        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'niveauAcademique' => 'required',
            'statut' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $enseignant = new Enseignant;
        $enseignant->nom = $request->input("nom");
        $enseignant->prenom = $request->input("prenom");
        $enseignant->sexe = $request->input("sexe");
        $enseignant->niveauAcademique = $request->input("niveauAcademique");
        $enseignant->statut = $request->input("statut");
        $enseignant->email = $request->input("email");
        $enseignant->password = Hash::make($request->input("password"));
        $enseignant->save();

        return redirect('/enseignants')->with("success", "L'enseignant a été ajouté!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        $enseignant = Enseignant::find($enseignant->id);
        $this->authorize('view', $enseignant);
        return view("enseignants.show", compact('enseignant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        $enseignant = Enseignant::find($enseignant->id);
        $this->authorize('update', $enseignant);
        $levels = [
            ["3", "BAC+3"],
            ["5", "BAC+5"],
            ["7", "BAC+7"]
        ];

        return view("enseignants.edit", compact("enseignant", "levels"));
    }

    /**
     * Update the specified resource in storprenom.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $this->authorize('update', $enseignant);
        
        $data = request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'niveauAcademique' => 'required',
            'statut' => 'required'
        ]);
        
        $enseignant->update($data);
        
        return redirect('/enseignants')->with("success", "L'enseignant a été modifié!");
    }

    /**
     * Remove the specified resource from storprenom.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant = Enseignant::find($enseignant->id);
        $this->authorize('delete', $enseignant);
        $enseignant->user->delete();
        $enseignant->delete();

        return redirect('/enseignants')->with("success", "L'enseignant a été supprimé!");
    }
}
