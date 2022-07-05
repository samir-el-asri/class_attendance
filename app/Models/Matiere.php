<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Matiere extends Model
{
    use HasFactory;
    use Searchable;

    protected $touches = ['enseignant', 'filiere'];

    protected $fillable = [
        'titre', 'coefficient', 'nbreSeance', 'dureeSeance', 'dateDebut', 'annee', 'filiere_id', 'enseignant_id'
    ];

    protected static function boot(){
        parent::boot();
        static::created(function($matiere){
            
            $classes = Classe::where(
                [
                    'filiere_id' => $matiere->filiere_id,
                    'annee' => $matiere->annee
                ]
            )->pluck('id')->toArray();
            
            for($i=1 ; $i<=$matiere->nbreSeances ; $i++){
                for($j=0 ; $j<count($classes) ; $j++){
                    $matiere->seances()->create([
                        'date' => date("Y-m-d", strtotime($matiere->dateDebut . "+$i week")),
                        'classe_id' => $classes[$j]
                    ]);
                    $matiere->save();
                }
            }

        });
    }
    
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
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
        $array = $this->transform($array);

        $array['matiere_titre'] = $this->titre;

        $array['enseignant_id'] = $this->enseignant_id;
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
        return 'matieres_index';
    }
}
