@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Matieres:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto text-center w-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $matiere)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="matieres/{{$matiere->id}}">{{$matiere->titre}}</a>
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
