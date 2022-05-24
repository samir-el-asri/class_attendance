@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/etudiants/{{$etudiant->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><label for="nom">Nom:</label><input type="text" class="form-control"
                            id="nom" name="nom" placeholder="Saisir votre nom" value="{{$etudiant->nom}}" /></div>
                    <div class="form-group">
                        <label for="classe_id">Classe:</label>
                        <select class="form-control" id="classe_id" name="classe_id">
                            @foreach ($classes as $classe)
                                @if ($etudiant->classe == $classe)
                                    <option selected value="{{$classe['id']}}">{{$classe['nom']}}</option>
                                @else
                                    <option value="{{$classe['id']}}">{{$classe['nom']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><label for="age">Age: </label><input type="number" class="form-control"
                            id="age" min="18" max="30" name="age" value="{{$etudiant->age}}" /></div>
                    <div class="form-group"><button class="btn btn-primary w-100" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
