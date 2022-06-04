@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/classes/{{$classe->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><label class="font-weight-bold" for="filiere">Filiére:</label><select class="form-control"
                            name="filiere_id">
                            @foreach ($filieres as $filiere)
                                @if ($filiere->id == $classe->filiere_id)
                                    <option selected value="{{$filiere->id}}">{{$filiere->titre}}</option>
                                @else
                                    <option value="{{$filiere->id}}">{{$filiere->titre}}</option>
                                @endif
                            @endforeach
                        </select></div>
                    <div class="form-group"><label class="font-weight-bold" for="annee">Année: </label><select class="form-control" id="annee"
                            name="annee">
                            @foreach ($annees as $annee)
                                @if ($classe->annee == $annee[0])
                                    <option selected value="{{$annee[0]}}">{{$annee[1]}}</option>
                                @else
                                    <option value="{{$annee[0]}}">{{$annee[1]}}</option>
                                @endif
                            @endforeach
                        </select></div>
                    <div class="form-group"><label class="font-weight-bold" for="groupe">Groupe:</label><input type="text" class="form-control"
                            id="groupe" placeholder="G1" name="groupe" value="{{$classe->groupe}}" /></div>
                    <div class="form-group"><label class="font-weight-bold" for="anneeScolaire">Année Scolaire</label><input type="text"
                            class="form-control" id="anneeScolaire" placeholder="2022/2023" name="anneeScolaire" value="{{$classe->anneeScolaire}}" />
                    </div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
