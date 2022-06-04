@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/filieres/{{$filiere->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="font-weight-bold" for="titre">Titre: </label>
                        <input type="text" class="form-control" id="titre" name="titre" value="{{$filiere->titre}}"/>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="abbreviation">Abbreviation: </label>
                        <input type="text" class="form-control" id="abbreviation" name="abbreviation" value="{{$filiere->abbreviation}}"/>
                    </div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Modifier</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
