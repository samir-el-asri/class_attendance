<?php

namespace App\Policies;

use App\Models\Classe;
use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Classe $classe)
    {
        if(!($user->fonction === "admin")){
            // Tester que l'enseignant enseigne une matiere dans cette classe
            if($user->fonction === "enseignant"){
                if(!empty($classe->seances)){
                    $enseignants = [];
                    foreach($classe->seances as $seance){
                        array_push($enseignants, $seance->matiere->enseignant_id);
                    }
                    return(in_array($user->enseignant->id, $enseignants));
                }
            }

            // Tester que l'etudiant est un membre de cette classe
            if($user->fonction === "etudiant"){
                return($classe->etudiants->contains($user->etudiant));
            }
        }
        else
            return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Classe $classe)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Classe $classe)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Classe $classe)
    {
        //
    }
}
