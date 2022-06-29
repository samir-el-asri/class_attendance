@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 mx-auto">
                <form method="post" action="/justifications" enctype="multipart/form-data">
                    @csrf
                    <legend>Déposer une justification d'absences:</legend>
                    <div class="form-group"><label class="font-weight-bold" for="dateDebut">Date Debut:</label><input type="date" class="form-control" id="dateDebut" name="dateDebut" />
                    </div>
                    <div class="form-group"><label class="font-weight-bold" for="dateFin">Date Fin:</label><input type="date" class="form-control" id="dateDebut" name="dateFin" />
                    </div>
                    <div class="form-group"><label class="font-weight-bold" for="document">Document (max: 10MB):</label><input type="file" class="form-control" id="document" name="document" />
                    </div>
                    <div class="form-group"><button class="btn btn-primary w-100 mt-2" type="submit">Ajouter</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
