@extends('layouts.app')

@section('content')

    <div class="container">
        @if (Auth::user()->fonction == "etudiant")
            <div class="col-10 mx-auto">
                <a class="text-white" href="/justifications/create">
                    <button class="btn btn-success">Déposer une justification d'absence</button>
                </a>
                <hr>
            </div>

            <div class="row mt-4">
                <div class="col-10 mx-auto">
                    <h3>Mes absences (non-justifiées): </h3>
                </div>
            </div>

            <div id="etudiantsAbsencesTabs" class="col-10 mx-auto">
                <ul>
                    @foreach ($absencesCategorized as $key => $value)
                        <li><a href="#tabs-{{$key}}">{{$value["matiere"]}}</a></li>
                    @endforeach
                </ul>
                
                @foreach ($absencesCategorized as $key => $value)
                    <div id="tabs-{{$key}}">
                        <div class="table-responsive text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Matiere</th>
                                    <th>Enseignant</th>
                                    <th>Date</th>
                                    <th>Duree Seance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($value["absences"] as $absence)
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
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col-10 mx-auto">
                    <hr>
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

            <div class="row mt-4">
                <div class="col-10 mx-auto">
                    <hr>
                    <h4>Mes Justifications d'Absences: </h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-10 mx-auto">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Document</th>
                                    <th>Validée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($justifications as $justification)
                                    <tr>
                                        <td>{{$justification->dateDebut}}</td>
                                        <td>{{$justification->dateFin}}</td>
                                        <td><a href="/storage/documents/{{$justification->document}}">Voir le document</a></td>
                                        <td>
                                            @if ($justification->validee)
                                                Oui
                                            @else
                                                Non
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        @elseif(Auth::user()->fonction == "admin")
            <div class="mx-auto">
                <div class="table-responsive text-center w-75 mx-auto mt-8">
                    <hr>
                    <h3>Nombre d'absences par Etudiant:</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Etudiant</th>
                                <th>Nombre d'Absences</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parEtudiant as $etudiant)
                                <tr>
                                    <td><a class="text-muted" href="etudiants/{{$etudiant['id']}}">{{$etudiant["nom"]}}</a></td>
                                    <td>{{$etudiant["nbreAbsences"]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>

                <div id="adminTabs2" class="col-10 mx-auto mt-8">
                    <h3 class="text-center">liste des absences:</h3>
                    <ul>
                        @foreach ($seancesToShow as $key => $value)
                            <li><a href="#tabs-{{$key}}">{{$value["classe"]}}</a></li>
                        @endforeach
                    </ul>
                    
                    @foreach ($seancesToShow as $key => $value)
                        <div id="tabs-{{$key}}">
                            <div class="table-responsive text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Matiere</th>
                                            <th>Enseignant</th>
                                            <th>Nombre d'Absences</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($value["seances"] as $seance)
                                            <tr>
                                                <td>{{$seance["matiere"]}}</td>
                                                <td>{{$seance["enseignant"]}}</td>
                                                <td>{{$seance["nbreAbsences"]}}</td>
                                                <td><a href="seances/{{$seance['id']}}">{{$seance["date"]}}</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="table-responsive text-center w-75 mx-auto mt-6">
                    <hr>
                    <h3>Les justifications d'absence:</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Document</th>
                                    <th>Validée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($justifications as $justification)
                                    <tr>
                                        <td>{{$justification->dateDebut}}</td>
                                        <td>{{$justification->dateFin}}</td>
                                        <td><a href="/storage/documents/{{$justification->document}}">Voir le document</a></td>
                                        <td>
                                            @if ($justification->validee)
                                                Oui
                                            @else
                                                Non
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection