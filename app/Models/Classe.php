<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Classe extends Model
{
    use HasFactory;
    use Searchable;

    protected $touches = ['filiere'];

    protected $fillable = [
        'filiere_id', 'annee', 'groupe', 'anneeScolaire'
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, "filiere_id");
    }
    
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array = $this->only('annee', 'groupe', 'anneeScolaire');
        $array = $this->transform($array);

        $titre = $this->annee.$this->filiere->abbreviation."-".$this->groupe;
        $array['titre'] = $titre;
        $array['filiere_id'] = $this->filiere_id;
        
        return $array;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'classes_index';
    }
}
