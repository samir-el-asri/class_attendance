@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Enseignants:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto text-center w-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignants as $enseignant)
                        <tr>
                            <td>
                                <a class="text-muted text-decoration-none" href="enseignants/{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}</a>
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
