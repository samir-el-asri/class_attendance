<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'coefficient', 'filiere_id'
    ];
    
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}
