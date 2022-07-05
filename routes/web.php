<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\MatieresController;
use App\Http\Controllers\FilieresController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\JustificationsController;
use App\Search\All_index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('etudiants', EtudiantsController::class);
Route::resource('classes', ClassesController::class);
Route::resource('matieres', MatieresController::class);
Route::resource('filieres', FilieresController::class);
Route::resource('enseignants', EnseignantsController::class);
Route::resource('seances', SeancesController::class);
Route::resource('absences', AbsencesController::class);
Route::resource('justifications', JustificationsController::class);

Route::get('search', function (Request $request) {
    $results = All_index::search($request->search)->get();
    
    $search_query = ((string)($request->search));
    $filieres = array();
    $matieres = array();
    $classes = array();
    $enseignants = array();
    $etudiants = array();

    foreach($results as $result){
        switch (get_class($result)) {
            case 'App\Models\Filiere':
                array_push($filieres, $result);
                break;
            case 'App\Models\Matiere':
                array_push($matieres, $result);
                break;
            case 'App\Models\Classe':
                array_push($classes, $result);
                break;
            case 'App\Models\Enseignant':
                array_push($enseignants, $result);
                break;
            case 'App\Models\Etudiant':
                array_push($etudiants, $result);
                break;
        }
    }

    $filieres = collect($filieres)->map(function ($filiere) {
        return (object) $filiere;
    });
    $matieres = collect($matieres)->map(function ($matiere) {
        return (object) $matiere;
    });
    $classes = collect($classes)->map(function ($classe) {
        return (object) $classe;
    });
    $enseignants = collect($enseignants)->map(function ($enseignant) {
        return (object) $enseignant;
    });
    $etudiants = collect($etudiants)->map(function ($etudiant) {
        return (object) $etudiant;
    });

    return view('search.search', compact('search_query', 'filieres', 'matieres', 'classes', 'enseignants', 'etudiants'));
});