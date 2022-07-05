@extends('layouts.app')

@section('content')

<div class="mx-auto col-10">
    <h5>Search results for "{{$search_query}}"</h5>
    <hr>
</div>

{{-- <div id="searchTabs">
    <ul>
        <li><a href="#tab-1">one</a></li>
        <li><a href="#tab-2">Two</a></li>
        <li><a href="#tab-3">Three</a></li>
    </ul>
    <div id="tab-1">
        One: 1
    </div>
    <div id="tab-2">
        Two: 2
    </div>
    <div id="tab-3">
        Three: 3
    </div>
</div> --}}

<div id="searchTabs" class="mx-auto col-10">
    <ul>
        @if (count($filieres) > 0)
            <li><a href="#tab-filieres">Filieres</a></li>
        @endif
        @if (count($matieres) > 0)
            <li><a href="#tab-matieres">Matieres</a></li>
        @endif
        @if (count($classes) > 0)
            <li><a href="#tab-classes">Classes</a></li>
        @endif
        @if (count($enseignants) > 0)
            <li><a href="#tab-enseignants">Enseignants</a></li>
        @endif
        @if (count($etudiants) > 0)
            <li><a href="#tab-etudiants">Etudiants</a></li>
        @endif
    </ul>
    @if (count($filieres) > 0)
        <div id="tab-filieres">
            <div class="container">
                @foreach ($filieres as $filiere)
                    <div class="row">
                        <div class="col-md-6">
                            <h5><a href="filieres/{{$filiere->id}}">{{$filiere->titre}}</a></h5>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($matieres) > 0)
        <div id="tab-matieres">
            <div class="container">
                @foreach ($matieres as $matiere)
                    <div class="row">
                        <div class="col-md-6">
                            <h5><a href="matieres/{{$matiere->id}}">{{$matiere->titre}}</a></h5>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($classes) > 0)
        <div id="tab-classes">
            <div class="container">
                @foreach ($classes as $classe)
                    <div class="row">
                        <div class="col-md-6">
                            <h5><a href="classes/{{$classe->id}}">{{$classe->annee.$classe->filiere->abbreviation."-".$classe->groupe}}</a></h5>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($enseignants) > 0)
        <div id="tab-enseignants">
            <div class="container">
                @foreach ($enseignants as $enseignant)
                    <div class="row">
                        <div class="col-md-6">
                            <h5><a href="enseignants/{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}</a></h5>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($etudiants) > 0)
        <div id="tab-etudiants">
            <div class="container">
                @foreach ($etudiants as $etudiant)
                    <div class="row">
                        <div class="col-md-6">
                            <h5><a href="etudiants/{{$etudiant->id}}">{{$etudiant->prenom." ".$etudiant->nom}}</a></h5>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    @endif
</div>

@endsection
