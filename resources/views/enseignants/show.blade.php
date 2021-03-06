@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center">
        <div class="mx-auto mb-2">
            <img style="width: 100px; height: 100px;" class="border border-dark rounded-circle mx-auto" src="{{$enseignant->profilePhoto()}}">
        </div>
        <h4 class="card-title">{{$enseignant->prenom." ".$enseignant->nom}}</h4>
        <h6 class="text-muted card-subtitle mb-2">Email: {{$enseignant->email}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Sexe: {{$enseignant->sexe}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Niveau Académique: BAC+{{$enseignant->niveauAcademique}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Statut: {{$enseignant->statut}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Nombre des matieres: {{$enseignant->matieres->count()}}</h6>
        @canany(['update', 'delete'], $enseignant)
            <a href="/enseignants/{{$enseignant->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
            <form method="post" action="/enseignants/{{$enseignant->id}}" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-primary btn-danger" type="submit">Supprimer</button>
            </form>
        @endcanany
        <div class="table-responsive text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Les Matieres</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignant->matieres as $matiere)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="/matieres/{{$matiere->id}}">{{$matiere->titre}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection