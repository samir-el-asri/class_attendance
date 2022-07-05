<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Enseignant;

class all_index extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        Filiere::class,
        Matiere::class,
        Etudiant::class,
        Classe::class,
        Enseignant::class
    ];
}
