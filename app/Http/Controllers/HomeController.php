<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                
                return view('home', compact("hello"));
            }
            break;
            case 'enseignant':{
                $matieres = auth()->user()->enseignant->matieres;
                return view('home', compact("matieres"));
            }
            break;
            case 'etudiant':{
                $hello = "hi etudiant!";
                return view('home', compact("hello"));
            }
            break;
            default:
                return view('home');
                break;
        }
    }
}