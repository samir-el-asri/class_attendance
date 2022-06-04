@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Filieres:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto text-center w-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filieres as $filiere)
                        @can('view', $filiere)
                            <tr>
                                <td>
                                    <a class="text-muted text-decoration-none" href="filieres/{{$filiere->id}}">{{$filiere->titre}}</a>
                                </td>
                            </tr>
                        @endcan
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
