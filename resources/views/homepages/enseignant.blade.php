<div id="tabs">
    <ul>
      @foreach ($matieres as $matiere)
      <li><a href="#tabs-{{$matiere->id}}">{{$matiere->titre}}</a></li>
      @endforeach
    </ul>
    @foreach ($matieres as $matiere)
      <div id="tabs-{{$matiere->id}}">
        <div class="table-responsive text-center">
          <table class="table">
              <thead>
                  <tr>
                    <th>Date </th>
                    <th>Classe </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($matiere->seances->sortBy('date') as $seance)
                  @if ($seance->absenceMarquee)
                    <tr class="marquee">
                  @else
                    <tr class="non-marquee">
                  @endif
                    <td>
                      <a href="/seances/{{$seance->id}}">{{$seance->date}}</a>
                    </td>
                    <td>{{$seance->classe->annee.$seance->classe->filiere->abbreviation."-".$seance->classe->groupe}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    @endforeach
</div>
