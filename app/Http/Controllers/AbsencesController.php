<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Seance;
use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Justification;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->fonction == "etudiant"){
            // Tableau consultation absences:

            $absences = auth()->user()->etudiant->absences;
            $matieres = array();
            $absencesCategorized = array();

            foreach($absences as $absence){
                if(!in_array($absence->seance->matiere->titre ,$matieres)){
                    array_push($matieres, $absence->seance->matiere->titre);
                }
            }
            foreach($matieres as $matiere){
                $as = array();
                foreach($absences as $absence){
                    if($absence->seance->matiere->titre == $matiere){
                        array_push($as, $absence);
                    }
                }

                $m = array("matiere"=>$matiere, "absences"=>$as);
                array_push($absencesCategorized, $m);
            }
            // dd($absencesCategorized);

            // Tableau "notes à soustraire":

            $notesASoustraire = array();
            $notesASoustraireN = array();
    
            foreach($absences as $absence){
                $matiere = $absence->seance->matiere->titre;
                if((int)$absence->seance->matiere->dureeSeance <= 2){
                    array_push($notesASoustraire, array("matiere" => $matiere, "note" => 0.20));
                }
                else{
                    array_push($notesASoustraire, array("matiere" => $matiere, "note" => 0.40));
                }
            }
    
            // dd($notesASoustraire);
            foreach($notesASoustraire as $a){
                $entry = $a;
                $entry["note"] = 0;
                foreach($notesASoustraire as $aa){
                    if($aa["matiere"] == $entry["matiere"]){
                        $entry["note"] += $aa["note"];
                    }
                }
                if(!in_array($entry, $notesASoustraireN)){
                    array_push($notesASoustraireN, $entry);
                }
            }
        
            //$this->authorize('viewAny', auth()->user());
            $justifications = auth()->user()->etudiant->justifications;
            return view('absences.index', compact('absencesCategorized', 'notesASoustraireN', 'justifications'));
        }
        elseif(auth()->user()->fonction == "admin"){
            // Par Classe:

            $seancesToShow = array();
            $classes = Classe::all();
            $classeTitles = array();
            $seances = Seance::where("absenceMarquee", 1)->get();
            $justifications = Justification::all();
            
            foreach($classes as $classe){
                array_push($classeTitles, $classe->annee.$classe->filiere->abbreviation."-".$classe->groupe);
            }

            foreach($classeTitles as $classe){
                $s = array();

                foreach($seances as $seance){
                    $seanceClasse = $seance->classe->annee.$seance->classe->filiere->abbreviation."-".$seance->classe->groupe;
                    
                    if($seanceClasse == $classe){
                        $absences = Absence::where('seance_id', $seance->id)->get();
                        $c = $absences->count();
                        $seance = array(
                            "matiere" => $seance->matiere->titre,
                            "enseignant" => $seance->matiere->enseignant->prenom." ".$seance->matiere->enseignant->nom,
                            "date" => $seance->date,
                            "nbreAbsences" => $c,
                            "id" => $seance->id
                        );
                        
                        array_push($s, $seance);
                    }
                }

                $c = array("classe" => $classe, "seances" => $s);
                array_push($seancesToShow, $c);
            }
            
            // Par etudiant:
            $etudiants_id = array_unique(Absence::all()->pluck('etudiant_id')->all());
            $etudiants = array();
            foreach($etudiants_id as $e){
                $e = Etudiant::where("id", $e)->first();
                $c = Absence::where("etudiant_id", $e->id)->get();
                array_push($etudiants, [
                    "id" => $e->id,
                    "nom" => $e->prenom." ".$e->nom,
                    "nbreAbsences" => $c->count()
                ]);
            }
            $parEtudiant = $etudiants;

            return view('absences.index', compact('seancesToShow', 'parEtudiant', 'justifications'));
        }
        else{
            return view('absences.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'presence' => ''
        ]);

        $seance = Seance::find($request->input("seance_id"));
        $classe_etudiants = Etudiant::where("classe_id", $seance->classe_id)->pluck('id')->all();
        
        foreach($classe_etudiants as $e){
            if(!empty($request->input("presence"))){
                if(!in_array($e, $request->input("presence"))){
                    $absence = new Absence;
                    $absence->date = $seance->date;
                    $absence->seance_id = $seance->id;
                    $absence->etudiant_id = $e;
                    $absence->save();
                }
            }
            else{
                // Toute la classe est absente:
                $absence = new Absence;
                $absence->date = $seance->date;
                $absence->seance_id = $seance->id;
                $absence->etudiant_id = $e;
                $absence->save();
            }
        }

        $seance->absenceMarquee = true;
        $seance->save();

        return back()->with("success", "La présence a été saisie!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        //
    }
}
