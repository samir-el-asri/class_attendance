<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'age', 'classe_id'
    ];

    protected static function boot(){
        parent::boot();
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(Classe::class)->withTimestamps();
    }
}