<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'age', 'sexe', 'classe_id'
    ];

    protected static function boot(){
        parent::boot();
        static::created(function($etudiant){
            $etudiant->user()->create([
                'name' => $etudiant->prenom." ".$etudiant->nom,
                'email' => $etudiant->email,
                'password' => $etudiant->password,
                'fonction' => 'etudiant'
            ]);
            $etudiant->save();

            $etudiant->user_id = User::where('email', $etudiant->email)->pluck('id')->first();
            $etudiant->save();
        });
    }
    
    public function Classe()
    {
        return $this->belongsTo(Classe::class, "classe_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    
    public function justifications()
    {
        return $this->hasMany(Justification::class);
    }
}