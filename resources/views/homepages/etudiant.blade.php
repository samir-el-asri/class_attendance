@extends('layouts.app')

@section('content')

<div class="row w-75 mx-auto">
    <div class="row mt-4">
        <div class="col-10 mx-auto">
            <h3>Mes absences (non-justifiées) cette semaine: </h3>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-10 mx-auto">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Matiére</th>
                            <th>Enseignant</th>
                            <th>Date </th>
                            <th>Durée Séance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absences->sortBy('date') as $absence)
                            <tr>
                                <td>{{$absence->seance->matiere->titre}}</td>
                                <td>{{$absence->seance->matiere->enseignant->prenom." ".$absence->seance->matiere->enseignant->nom}}</td>
                                <td>{{$absence->date}}</td>
                                <td>{{$absence->seance->matiere->dureeSeance}} H</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-10 mx-auto">
            <h4>Notes à soustraire: </h4>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-10 mx-auto">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Matiére</th>
                            <th class="bg-danger">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notesASoustraireN as $n)
                            <tr>
                                <td>{{$n["matiere"]}}</td>
                                <td>-{{$n["note"]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
