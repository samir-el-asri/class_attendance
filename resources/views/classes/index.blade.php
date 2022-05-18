@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Classes:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Filiére</th>
                        <th>Annee</th>
                        <th>Groupe</th>
                        <th>Annee Scolaire</th>
                        <th><span style="text-decoration: line-through;">CR</span>UD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $classe)
                        <tr>
                            <td>{{$classe->filiere}}</td>
                            <td>{{$classe->annee}}</td>
                            <td>{{$classe->groupe}}</td>
                            <td>{{$classe->anneeScolaire}}</td>
                            <td>
                                <a href="/classes/{{$classe->id}}/edit"><button class="btn btn-primary btn-warning" type="button">Modifier</button></a>
                                <form method="post" action="/classes/{{$classe->id}}" class="d-inline">
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
        <a class="text-white" href="/classes/create">
            <button class="btn btn-success">Ajouter une nouvelle classe</button>
        </a>
        {{-- @endif --}}
    </div>

</div>

@endsection
