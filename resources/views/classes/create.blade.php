@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/classes">
                    @csrf
                    <div class="form-group"><label class="font-weight-bold" for="filiere">Filiére:</label><select class="form-control"
                            name="filiere_id">
                            @foreach ($filieres as $filiere)
                                <option value="{{$filiere->id}}">{{$filiere->titre}}</option>
                            @endforeach
                        </select></div>
                    <div class="form-group"><label class="font-weight-bold" for="annee">Année: </label><select class="form-control" id="annee"
                            name="annee">
                            <option value="3">3éme Année</option>
                            <option value="4">4éme année</option>
                            <option value="5">5éme année</option>
                        </select></div>
                    <div class="form-group"><label class="font-weight-bold" for="groupe">Groupe:</label><input type="text" class="form-control"
                            id="groupe" placeholder="G1" name="groupe" /></div>
                    <div class="form-group"><label class="font-weight-bold" for="anneeScolaire">Année Scolaire:</label><input type="text"
                            class="form-control" id="anneeScolaire" placeholder="2022/2023" name="anneeScolaire" />
                    </div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Ajouter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
