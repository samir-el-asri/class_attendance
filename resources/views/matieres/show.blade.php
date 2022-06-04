@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center">
        <h4 class="card-title">{{$matiere->titre}}</h4>
        <a class="card-link text-decoration-none" href="/filieres/{{$matiere->filiere->id}}">
            <h6 class="text-muted mb-2">Filiere: {{$matiere->filiere->titre}}</h6>
        </a>
        <h6 class="text-muted card-subtitle mb-2">Annee: {{$matiere->annee}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Coefficient: {{$matiere->coefficient}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Nombre de Seances: {{$matiere->nbreSeances}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Duree de Seance: {{$matiere->dureeSeance}} H</h6>
        <h6 class="text-muted card-subtitle mb-2">Date Debut: {{$matiere->dateDebut}}</h6>
        <a class="card-link text-decoration-none" href="/enseignants/{{$matiere->enseignant->id}}">
            <h6 class="text-muted mb-2">Enseignant: {{$matiere->enseignant->prenom." ".$matiere->enseignant->nom}}</h6>
        </a>
        @canany(['update', 'delete'], $matiere)
            <a href="/matieres/{{$matiere->id}}/edit"><button class="btn btn-primary btn-warning"
                    type="button">Modifier</button></a>
            <form method="post" action="/matieres/{{$matiere->id}}" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-primary btn-danger" type="submit">Supprimer</button>
            </form>
        @endcanany
        <div class="table-responsive text-center d-inline-table">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Les Seances</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matiere->seances->sortBy('date') as $seance)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="/seances/{{$seance->id}}">{{$seance->date}}</a>
                            </td>
                            <td>
                                <a class="text-muted text-decoration-none" href="/classes/{{$seance->classe->id}}">{{$seance->classe->annee.$seance->classe->filiere->abbreviation."-".$seance->classe->groupe}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
