<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'filiere_id', 'annee', 'groupe', 'anneeScolaire'
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class)->withTimestamps();
    }
    
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, "filiere_id");
    }
}
