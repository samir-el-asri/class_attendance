@extends('layouts.app')

@section('content')

<div class="row mx-auto">
    <div class="col-8 mx-auto">
        <h1>Les Classes:</h1>
        <hr>
        <div class="table-responsive table-bordered mx-auto text-center w-50yy">
            <table class="table">
                <thead>
                    <tr>
                        <th>Classe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $classe)
                        @can('view', $classe)
                            <tr>
                                <td>
                                    <a class="text-muted text-decoration-none" href="classes/{{$classe->id}}">{{$classe->annee.$classe->filiere->abbreviation."-".$classe->groupe}}</a>
                                </td>
                            </tr>
                        @endcan
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
