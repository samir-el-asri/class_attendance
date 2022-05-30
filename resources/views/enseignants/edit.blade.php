@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/enseignants/{{$enseignant->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><label for="nom">Nom:</label><input type="text" value="{{$enseignant->nom}}" class="form-control"
                            id="nom" name="nom" /></div>
                    <div class="form-group"><label for="prenom">Prenom:</label><input type="text" value="{{$enseignant->prenom}}"
                            class="form-control" id="prenom" name="prenom" />
                    </div>
                    <div class="form-group"><label for="niveauAcademique">Niveau Académique: </label><select class="form-control" id="niveauAcademique"
                        name="niveauAcademique">
                        @foreach ($levels as $level)
                            @if ($enseignant->niveauAcademique == $level[0])
                                <option selected value="{{$level[0]}}">{{$level[1]}}</option>
                            @else
                                <option value="{{$level[0]}}">{{$level[1]}}</option>
                            @endif
                        @endforeach
                    </select></div>
                    <div class="form-group"><label for="statut">Statut: </label>
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
                    <div class="form-group"><button class="btn btn-primary w-100" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
