<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Enseignant extends Model
{
    use HasFactory;
    use Searchable;

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

    function profilePhoto(){
        return "/storage/profile_photos/enseignants/".$this->profilePhoto;
    }
    
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array = $this->transform($array);

        $array["enseignant_nom"] = $this->nom;
        $array["enseignant_prenom"] = $this->prenom;
        $array["enseignant_statut"] = $this->statut;
        $array["enseignant_email"] = $this->email;
        return $array;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'enseignants_index';
    }
}
