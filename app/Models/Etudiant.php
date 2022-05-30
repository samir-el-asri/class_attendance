<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'age', 'classe_id'
    ];

    protected static function boot(){
        parent::boot();
    }
    
    public function Classe()
    {
        return $this->belongsTo(Classe::class, "classe_id", "id");
    }
}