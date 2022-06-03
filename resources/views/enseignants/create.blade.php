@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/enseignants">
                    @csrf
                    <div class="form-group"><label for="nom">Nom:</label><input type="text" class="form-control"
                            id="nom" name="nom" /></div>
                    <div class="form-group"><label for="prenom">Prenom:</label><input type="text"
                            class="form-control" id="prenom" name="prenom" />
                    </div>
                    <div class="form-group"><label for="niveauAcademique">Niveau Académique: </label><select class="form-control" id="niveauAcademique"
                        name="niveauAcademique">
                        <option value="3">BAC+3</option>
                        <option value="5">BAC+5</option>
                        <option value="7">BAC+7</option>
                    </select></div>
                    <div class="form-group"><label for="statut">Statut: </label><select class="form-control" id="statut"
                        name="statut">
                        <option value="vacataire">Vacataire</option>
                        <option value="permanent">Permanent</option>
                    </select></div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Ajouter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
