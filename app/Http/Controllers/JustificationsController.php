<?php

namespace App\Http\Controllers;

use App\Models\Justification;
use Illuminate\Http\Request;

class JustificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $justifications = Justification::all();
        return view("justifications.index", compact("justifications"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("justifications.create");
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
            'dateDebut' => 'required',
            'dateFin' => 'required',
            'document' => 'required|max:10000'
        ]);


        if ($request->hasFile('document')) {
            $filenameWithExtension = $request->file("document")->getClientOriginalName();
            $extension = $request->file("document")->getClientOriginalExtension();
            $filenameWithoutExtension = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $filenameToStore = $filenameWithoutExtension."_etudiantId_".auth()->user()->etudiant->id."_".time().".".$extension;

            $request->file("document")->storeAs("public/documents", $filenameToStore);
        }

        $justification = new justification;
        $justification->dateDebut = $request->input("dateDebut");
        $justification->dateFin = $request->input("dateFin");
        $justification->etudiant_id = auth()->user()->etudiant->id;
        $justification->document = $filenameToStore;
        $justification->save();

        return redirect('/absences')->with("success", "La justification a été déposée!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function show(Justification $justification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function edit(Justification $justification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Justification $justification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Justification  $justification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Justification $justification)
    {
        //
    }
}
