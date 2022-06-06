<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'confirmee', 'justifiee', 'seance_id', 'etudiant_id'
    ];
    
    public function Etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    
    public function Seance()
    {
        return $this->belongsTo(Seance::class);
    }
}
