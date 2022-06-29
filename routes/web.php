<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\MatieresController;
use App\Http\Controllers\FilieresController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\JustificationsController;

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