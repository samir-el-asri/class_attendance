@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Enseignants:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Niveau Academique</th>
                        <th>Statut</th>
                        <th><span style="text-decoration: line-through;">CR</span>UD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignants as $enseignant)
                        <tr>
                            <td>{{$enseignant->prenom." ".$enseignant->nom}}</td>
                            <td>BAC+{{$enseignant->niveauAcademique}}</td>
                            <td>{{$enseignant->statut}}</td>
                            <td>
                                <a href="/enseignants/{{$enseignant->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
                                <form method="post" action="/enseignants/{{$enseignant->id}}" class="d-inline">
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
        <a class="text-white" href="/enseignants/create">
            <button class="btn btn-success">Ajouter un nouveau enseignant</button>
        </a>
        {{-- @endif --}}
    </div>

</div>

@endsection
