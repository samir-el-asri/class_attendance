@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Etudiants:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto text-center w-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etudiants as $etudiant)
                        @can('view', $etudiant)
                            <tr>
                                <td>
                                    <a class="text-muted text-decoration-none" href="etudiants/{{$etudiant->id}}">{{$etudiant->prenom." ".$etudiant->nom}}</a>
                                </td>
                            </tr>
                        @endcan
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
