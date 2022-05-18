<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'filiere', 'annee', 'groupe', 'anneeScolaire'
    ];

    public function etudiants(): HasMany
    {
        return $this->hasMany(Etudiant::class)->withTimestamps;
    }
}
