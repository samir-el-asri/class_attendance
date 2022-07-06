@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/enseignants/{{$enseignant->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="profilePhoto">Profile Photo (max: 5MB):</label>
                        <input type="file" class="form-control" name="profilePhoto">
                    </div>
                    <div class="form-group"><label class="font-weight-bold" for="nom">Nom:</label><input type="text" value="{{$enseignant->nom}}" class="form-control"
                            id="nom" name="nom" /></div>
                    <div class="form-group"><label class="font-weight-bold" for="prenom">Prenom:</label><input type="text" value="{{$enseignant->prenom}}"
                            class="form-control" id="prenom" name="prenom" />
                    </div>
                    <div class="form-group mt-2 mb-2">
                        Sexe:
                        @if ($enseignant->sexe == 'M')
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
                    <div class="form-group"><label class="font-weight-bold" for="niveauAcademique">Niveau Académique: </label><select class="form-control" id="niveauAcademique"
                        name="niveauAcademique">
                        @foreach ($levels as $level)
                            @if ($enseignant->niveauAcademique == $level[0])
                                <option selected value="{{$level[0]}}">{{$level[1]}}</option>
                            @else
                                <option value="{{$level[0]}}">{{$level[1]}}</option>
                            @endif
                        @endforeach
                    </select></div>
                    <div class="form-group"><label class="font-weight-bold" for="statut">Statut: </label>
                        <select class="form-control" id="statut" name="statut">
                            @if ($enseignant->statut == "vacataire")
                                <option selected value="vacataire">Vacataire</option>
                                <option value="permanent">Permanent</option>
                            @else
                                <option value="vacataire">Vacataire</option>
                                <option selected value="permanent">Permanent</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
