@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/matieres">
                    @csrf
                    <div class="form-group"><label for="titre">Titre:</label><input type="text" class="form-control"
                            id="titre" name="titre" />
                    </div>
                    <div class="form-group"><label for="annee">Année: </label><select class="form-control" id="annee"
                            name="annee">
                            <option value="3">3éme Année</option>
                            <option value="4">4éme année</option>
                            <option value="5">5éme année</option>
                        </select></div>
                    <div class="form-group"><label for="coefficient">Coefficient:</label><input type="number" min="1"
                            step="0.01" class="form-control" id="coefficient" name="coefficient" />
                    </div>
                    <div class="form-group"><label for="nbreSeances">Nombre de Seances: </label><input type="number" class="form-control"
                            id="nbreSeances" min="1" name="nbreSeances" /></div>
                    <div class="form-group"><label for="dureeSeance">Duree Seance (H):</label><input type="number" min="0"
                            step="0.01" class="form-control" id="dureeSeance" name="dureeSeance" />
                    </div>
                    <div class="form-group"><label for="dateDebut">Date Debut:</label><input type="date" class="form-control" id="dateDebut" name="dateDebut" />
                    </div>
                    <div class="form-group"><label for="filiere">Filiére:</label><select class="form-control"
                            name="filiere_id">
                            @foreach ($filieres as $filiere)
                            <option value="{{$filiere->id}}">{{$filiere->titre}}</option>
                            @endforeach
                        </select></div>
                    <div class="form-group"><label for="enseignant">Enseignant:</label><select class="form-control"
                            name="enseignant_id">
                            @foreach ($enseignants as $enseignant)
                            <option value="{{$enseignant->id}}">{{$enseignant->prenom." ".$enseignant->nom}}</option>
                            @endforeach
                        </select></div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Ajouter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
