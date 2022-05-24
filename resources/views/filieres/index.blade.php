@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Filieres:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Abbreviation</th>
                        <th><span style="text-decoration: line-through;">CR</span>UD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filieres as $filiere)
                    <tr>
                        <td>{{$filiere->titre}}</td>
                        <td>{{$filiere->abbreviation}}</td>
                        <td>
                            <a href="/filieres/{{$filiere->id}}/edit"><button class="btn btn-primary btn-warning"
                                    type="button">Modifier</button></a>
                            <form method="post" action="/filieres/{{$filiere->id}}" class="d-inline">
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
        <a class="text-white" href="/filieres/create">
            <button class="btn btn-success">Ajouter une nouvelle filiere</button>
        </a>
        {{-- @endif --}}
    </div>
</div>

@endsection
