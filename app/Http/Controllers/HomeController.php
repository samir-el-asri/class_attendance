<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Absence;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Seance;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (auth()->user()->fonction) {
            case 'admin':{
                $seancesToShow = array();
                $classes = Classe::all();
                $classeTitles = array();
                $seances = Seance::where('date', date('Y-m-d'))->get();
                
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
                                "nbreAbsences" => $c
                            );


                            array_push($s, $seance);
                        }
                    }

                    $c = array("classe" => $classe, "seances" => $s);
                    array_push($seancesToShow, $c);
                }

                return view('home', compact('seancesToShow'));
            }
            break;
            case 'enseignant':{
                $matieres = auth()->user()->enseignant->matieres;
                return view('home', compact("matieres"));
            }
            break;
            case 'etudiant':{

                $now = Carbon::now();

                $absences = Absence::whereBetween("date", [
                    $now->startOfWeek()->format('Y-m-d'),
                    $now->endOfWeek()->format('Y-m-d')
                 ])->where('etudiant_id', auth()->user()->etudiant->id)
                 ->get();

                $notesASoustraire = array();
                $notesASoustraireN = array();

                foreach($absences as $absence){
                    $matiere = $absence->seance->matiere->titre;
                    if((int)$absence->seance->matiere->dureeSeance <= 1.5){
                        array_push($notesASoustraire, array("matiere" => $matiere, "note" => 0.20));
                    }
                    else{
                        array_push($notesASoustraire, array("matiere" => $matiere, "note" => 0.40));
                    }
                }
                
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

                return view('home', compact('absences', 'notesASoustraireN'));
            }
            break;
            default:
                return view('home');
                break;
        }
    }
}