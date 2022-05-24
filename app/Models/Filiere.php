<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'abbreviation'
    ];
    
    public function matieres()
    {
        return $this->hasMany(Matiere::class)->withTimestamps();
    }

    public function classes()
    {
        return $this->hasMany(Classe::class)->withTimestamps();
    }
}
