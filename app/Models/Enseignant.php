<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'niveauAcademique', 'statut'
    ];

    public function matieres()
    {
        return $this->hasMany(Matiere::class)->withTimestamps();
    }
}
