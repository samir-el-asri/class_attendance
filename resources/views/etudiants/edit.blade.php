@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/etudiants/{{$etudiant->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="profilePhoto">Profile Photo (max: 5MB):</label>
                        <input type="file" class="form-control" name="profilePhoto">
                    </div>
                    <div class="form-group"><label class="font-weight-bold" for="nom">Nom:</label><input type="text" class="form-control"
                            id="nom" name="nom" placeholder="Saisir votre nom" value="{{$etudiant->nom}}" /></div>
                    <div class="form-group"><label class="font-weight-bold" for="prenom">Prenom:</label><input type="text" class="form-control"
                            id="prenom" name="prenom" placeholder="Saisir votre prenom" value="{{$etudiant->prenom}}" /></div>
                    <div class="form-group">
                    <div class="form-group mt-2 mb-2">
                        Sexe:
                        @if ($etudiant->sexe == 'M')
                            <label class="form-check-label" class="font-weight-bold" for="M">M:</label>
                            <input checked type="radio" class="form-check-input" id="M" name="sexe" value="M" />
                            <label class="form-check-label" class="font-weight-bold" for="F">F:</label>
                            <input type="radio" class="form-check-input" id="F" name="sexe" value="F" />
                        @else
                            <label class="form-check-label" class="font-weight-bold" for="M">M:</label>
                            <input type="radio" class="form-check-input" id="M" name="sexe" value="M" />
                            <label class="form-check-label" class="font-weight-bold" for="F">F:</label>
                            <input checked type="radio" class="form-check-input" id="F" name="sexe" value="F" />
                        @endif
                    </div>
                        <label class="font-weight-bold" for="classe_id">Classe:</label>
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
                    <div class="form-group"><label class="font-weight-bold" for="age">Age: </label><input type="number" class="form-control"
                            id="age" min="18" max="30" name="age" value="{{$etudiant->age}}" /></div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
