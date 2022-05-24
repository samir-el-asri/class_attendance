@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/filieres">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre: </label>
                        <input type="text" class="form-control" id="titre" name="titre" />
                    </div>
                    <div class="form-group">
                        <label for="abbreviation">Abbreviation: </label>
                        <input type="text" class="form-control" id="abbreviation" name="abbreviation" />
                    </div>
                    <div class="form-group"><button class="btn btn-primary w-100" type="submit">Ajouter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
