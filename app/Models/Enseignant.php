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

    protected static function boot(){
        parent::boot();
        static::created(function($enseignant){
            $enseignant->user()->create([
                'name' => $enseignant->prenom." ".$enseignant->nom,
                'email' => $enseignant->email,
                'password' => $enseignant->password,
                'fonction' => 'enseignant'
            ]);
            $enseignant->save();
        });
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
