<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::all();
        return view("classes.index", compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("classes.create");
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
            'filiere' => 'required',
            'annee' => 'required',
            'groupe' => 'required',
            'anneeScolaire' => 'required'
        ]);

        $classe = new Classe;
        $classe->filiere = $request->input("filiere");
        $classe->annee = $request->input("annee");
        $classe->groupe = $request->input("groupe");
        $classe->anneeScolaire = $request->input("anneeScolaire");
        $classe->save();

        return redirect('/classes')->with("success", "La classe a été ajoutée!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::find($id);

        $filieres = [
            ["IIR", "Ingénierie Informatique Et Réseaux"],
            ["IFA", "Ingénierie Financière Et Audit"],
            ["IAII", "Ingénierie Automatismes Et Informatique Industrielle"]
        ];

        $annees = [
            ["3", "3éme année"],
            ["4", "4éme année"],
            ["5", "5éme année"]
        ];

        return view("classes.edit", compact("classe", "filieres", "annees"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        //dd($classe);
        $data = request()->validate([
            'filiere' => 'required',
            'annee' => 'required',
            'groupe' => 'required',
            'anneeScolaire' => 'required'
        ]);
        
        $classe->update($data);
        
        return redirect('/classes')->with("success", "La classe a été modifiée!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);
        $classe->delete();

        return redirect('/classes')->with("success", "La classe a été supprimée!");
    }
}
