@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">{{$seance->matiere->titre}}</h4>
                    <h5 class="card-title">{{$seance->classe->annee.$seance->classe->filiere->abbreviation."-".$seance->classe->groupe}}</h5>
                    <h6 class="text-muted card-subtitle mb-2">{{$seance->matiere->enseignant->prenom." ".$seance->matiere->enseignant->nom}}</h6>
                    <h6 class="text-muted card-subtitle mb-2">{{$seance->date}}</h6>
                </div>
            </div>
        </div>
    </div>
    @if ($seance->absenceMarquee)
        <div class="row mt-2">
            <div class="col-lg-9 mx-auto">
                <h5 class="text-center">Liste des Etudiants:</h5>
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom </th>
                                <th>Présence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seance->classe->etudiants as $etudiant)
                                <tr>
                                    <td><a class="text-muted text-decoration-none" href="/etudiants/{{$etudiant->id}}">{{$etudiant->prenom." ".$etudiant->nom}}</a></td>
                                    @if (in_array($etudiant->id, $absences))
                                        <td>
                                            @if ($etudiant->sexe == 'M')
                                                Absent
                                            @else
                                                Absente
                                            @endif
                                        </td>
                                    @else
                                        <td>
                                            @if ($etudiant->sexe == 'M')
                                                Présent
                                            @else
                                                Présente
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-2">
            <div class="col-lg-9 mx-auto">
                <h5 class="text-center">Liste des Etudiants:</h5>
                <div class="table-responsive text-center">
                    <form method="post" action="/absences">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom </th>
                                    <th>Présent(e)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seance->classe->etudiants as $etudiant)
                                    <tr>
                                        <td><a class="text-muted text-decoration-none" href="/etudiants/{{$etudiant->id}}">{{$etudiant->prenom." ".$etudiant->nom}}</a></td>
                                        <td><input type="checkbox" name="presence[]" value="{{$etudiant->id}}" /></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <input hidden type="text" name="seance_id" value="{{$seance->id}}">
                                    <td colspan="2"><button class="btn btn-primary w-100" type="submit">Saisir</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
