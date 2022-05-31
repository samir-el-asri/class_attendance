@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Matieres:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Coefficient</th>
                        <th>Filiére</th>
                        <th>Enseignant</th>
                        <th><span style="text-decoration: line-through;">CR</span>UD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $matiere)
                        <tr>
                            <td>{{$matiere->titre}}</td>
                            <td>{{$matiere->coefficient}}</td>
                            <td>{{$matiere->filiere->abbreviation}}</td>
                            <td>{{$matiere->enseignant->prenom." ".$matiere->enseignant->nom}}</td>
                            <td>
                                <a href="/matieres/{{$matiere->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
                                <form method="post" action="/matieres/{{$matiere->id}}" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-primary btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- @if (!Auth::guest()) --}}
        <hr>
        <a class="text-white" href="/matieres/create">
            <button class="btn btn-success">Ajouter une nouvelle matiere</button>
        </a>
        {{-- @endif --}}
    </div>

</div>

@endsection
