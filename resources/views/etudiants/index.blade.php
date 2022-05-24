@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Etudiants:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Classe</th>
                        <th><span style="text-decoration: line-through;">CR</span>UD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etudiants as $etudiant)
                        <tr>
                            <td>{{$etudiant->nom}}</td>
                            <td>{{$etudiant->age}}</td>
                            <td>{{$etudiant->classe->annee.$etudiant->classe->filiere->abbreviation."-".$etudiant->classe->groupe}}</td>
                            <td>
                                <a href="/etudiants/{{$etudiant->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
                                <form method="post" action="/etudiants/{{$etudiant->id}}" class="d-inline">
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
        <a class="text-white" href="/etudiants/create">
            <button class="btn btn-success">Ajouter un nouveau etudiant</button>
        </a>
        {{-- @endif --}}
    </div>

</div>

@endsection
