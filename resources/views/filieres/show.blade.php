@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body text-center">
        <h4 class="card-title">{{$filiere->titre}}</h4>
        <h6 class="text-muted card-subtitle mb-2">Nombre des matieres: {{$filiere->matieres->count()}}</h6>
        <h6 class="text-muted card-subtitle mb-2">Nombre des classes: {{$filiere->classes->count()}}</h6>
        <a href="/filieres/{{$filiere->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
        <form method="post" action="/filieres/{{$filiere->id}}" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-primary btn-danger" type="submit">Supprimer</button>
        </form><br>
        <div class="table-responsive text-center d-inline-block col-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Les Matieres</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filiere->matieres as $matiere)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="/matieres/{{$matiere->id}}">{{$matiere->titre}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive text-center d-inline-block col-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Les Classes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filiere->classes as $classe)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="/classes/{{$classe->id}}">{{$classe->annee.$classe->filiere->abbreviation."-".$classe->groupe}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
