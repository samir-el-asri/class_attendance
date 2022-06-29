<div class="row mt-4">
    <div class="mx-auto">
        <h3>Les Séances d&#39;aujourd&#39;hui:</h3>
    </div>
</div>

<div class="row mt-2">
    <div class="mx-auto">
        <div id="adminTabs" class="col-10 mx-auto">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value["seances"] as $seance)
                                <tr>
                                    <td>{{$seance["matiere"]}}</td>
                                    <td>{{$seance["enseignant"]}}</td>
                                    <td>{{$seance["nbreAbsences"]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>