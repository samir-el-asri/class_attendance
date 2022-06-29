<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'dateDebut', 'dateFin', 'validee', 'document', 'etudiant_id'
    ];
    
    public function Etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
