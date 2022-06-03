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
                            id="titre" name="titre" value="{{$matiere->titre}}" /></div>
                    {{-- <div class="form-group"><label for="annee">Année: </label><select class="form-control" id="annee"
                            name="annee">
                            @foreach ($annees as $annee)
                            @if ($matiere->annee == $annee[0])
                            <option selected value="{{$annee[0]}}">{{$annee[1]}}</option>
                            @else
                            <option value="{{$annee[0]}}">{{$annee[1]}}</option>
                            @endif
                            @endforeach
                        </select></div> --}}
                    <div class="form-group"><label for="coefficient">Coefficient:</label><input type="number" min="1"
                            step="0.01" class="form-control" id="coefficient" name="coefficient"
                            value="{{$matiere->coefficient}}" />
                    </div>
                    <div class="form-group"><label for="dureeSeance">Duree Seance (H):</label><input type="number" min="0"
                            step="0.01" class="form-control" id="dureeSeance" name="dureeSeance" value="{{$matiere->dureeSeance}}"/>
                    </div>
                    {{-- <div class="form-group"><label for="filiere">Filiére:</label><select class="form-control"
                            name="filiere_id">
                            @foreach ($filieres as $filiere)
                            @if ($filiere->id == $matiere->filiere_id)
                            <option selected value="{{$filiere->id}}">{{$filiere->titre}}</option>
                            @else
                            <option value="{{$filiere->id}}">{{$filiere->titre}}</option>
                            @endif
                            @endforeach
                        </select></div> --}}
                    <div class="form-group"><label for="enseignant">Enseignant:</label><select class="form-control"
                            name="enseignant_id">
                            @foreach ($enseignants as $enseignant)
                            @if ($enseignant->id == $matiere->enseignant_id)
                            <option selected value="{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}
                            </option>
                            @else
                            <option value="{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}</option>
                            @endif
                            @endforeach
                        </select></div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
