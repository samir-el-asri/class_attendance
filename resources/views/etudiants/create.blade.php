@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/etudiants">
                    @csrf
                    <div class="form-group"><label for="nom">Nom:</label><input type="text" class="form-control"
                            id="nom" name="nom" placeholder="Saisir votre nom" /></div>
                    <div class="form-group"><label for="prenom">Prenom:</label><input type="text" class="form-control"
                            id="prenom" name="prenom" placeholder="Saisir votre prenom" /></div>
                    <div class="form-group">
                        <label for="classe_id">Classe:</label>
                        <select class="form-control" id="classe_id" name="classe_id">
                            @foreach ($classes as $classe)
                                <option value="{{$classe->id}}">{{$classe->annee.$classe->filiere->abbreviation."-".$classe->groupe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><label for="age">Age: </label><input type="number" class="form-control"
                            id="age" min="18" max="30" name="age" /></div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Ajouter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection