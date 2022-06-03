<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

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
}
