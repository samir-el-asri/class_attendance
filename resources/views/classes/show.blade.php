@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center">
        <h4 class="card-title">{{$classe->annee.$classe->filiere->abbreviation."-".$classe->groupe}}</h4>
        <a class="card-link text-decoration-none" href="/filieres/{{$classe->filiere->id}}">
            <h6 class="text-muted mb-2">Filiére: {{$classe->filiere->titre}}</h6>
        </a>
        <h6 class="text-muted card-subtitle mb-2">Groupe: {{$classe->groupe}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Année Scolaire: {{$classe->anneeScolaire}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Nombre des etudiants: {{$classe->etudiants->count()}}</h6>
        <a href="/classes/{{$classe->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
        <form method="post" action="/classes/{{$classe->id}}" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-primary btn-danger" type="submit">Supprimer</button>
        </form>
        <div class="table-responsive text-center d-inline-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Les Etudiants</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classe->etudiants as $etudiant)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="etudiants/{{$etudiant->id}}">{{$etudiant->prenom." ".$etudiant->nom}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive text-center d-inline-table">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Les Seances</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classe->seances as $seance)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="/matieres/{{$seance->matiere->id}}">{{$seance->matiere->titre}}</a>
                            </td>
                            <td>
                                {{$seance->date}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection