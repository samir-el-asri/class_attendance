<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'sexe', 'niveauAcademique', 'statut'
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
            
            $enseignant->user_id = User::where('email', $enseignant->email)->pluck('id')->first();
            $enseignant->save();
        });
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
