@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center">
        <div class="mx-auto mb-2">
            <img style="width: 100px; height: 100px;" class="border border-dark rounded-circle mx-auto" src="{{$etudiant->profilePhoto()}}">
        </div>
        <h4 class="card-title">{{$etudiant->prenom." ".$etudiant->nom}}</h4>
        <h6 class="text-muted card-subtitle mb-2">Age: {{$etudiant->age}} ans</h6>
        <h6 class="text-muted card-subtitle mb-2">Sexe: {{$etudiant->sexe}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Email: {{$etudiant->email}}</h6>
        <a class="card-link text-decoration-none" href="/classes/{{$etudiant->classe->id}}">
            <h6 class="text-muted mb-2">Classe: {{$etudiant->classe->annee.$etudiant->classe->filiere->abbreviation."-".$etudiant->classe->groupe}}</h6>
        </a>
        @canany(['update', 'delete'], $etudiant)
            <a href="/etudiants/{{$etudiant->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
            <form method="post" action="/etudiants/{{$etudiant->id}}" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-primary btn-danger" type="submit">Supprimer</button>
            </form>
        @endcanany
    </div>
</div>
@endsection