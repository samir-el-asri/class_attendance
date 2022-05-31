@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/matieres/{{$matiere->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><label for="titre">Titre:</label><input type="text" class="form-control"
                            id="titre" name="titre" value="{{$matiere->titre}}"/></div>
                    <div class="form-group"><label for="coefficient">Coefficient:</label><input type="number" min="1" step="0.01" 
                            class="form-control" id="coefficient" name="coefficient" value="{{$matiere->coefficient}}"/>
                    </div>
                    <div class="form-group"><label for="filiere">Filiére:</label><select class="form-control"
                        name="filiere_id">
                        @foreach ($filieres as $filiere)
                            @if ($filiere->id == $matiere->filiere_id)
                                <option selected value="{{$filiere->id}}">{{$filiere->titre}}</option>
                            @else
                                <option value="{{$filiere->id}}">{{$filiere->titre}}</option>
                            @endif
                        @endforeach
                    </select></div>
                    <div class="form-group"><label for="enseignant">Enseignant:</label><select class="form-control"
                        name="enseignant_id">
                        @foreach ($enseignants as $enseignant)
                            @if ($enseignant->id == $matiere->enseignant_id)
                                <option selected value="{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}</option>
                            @else
                                <option value="{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}</option>
                            @endif
                        @endforeach
                    </select></div>
                    <div class="form-group"><button class="btn btn-primary w-100" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
