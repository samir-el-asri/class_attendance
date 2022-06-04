<?php

namespace App\Policies;

use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnseignantPolicy
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
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Enseignant $enseignant)
    {
        if(!($user->fonction === "admin")){
            // Tester que c'est le meme enseignant
            if($user->fonction === "enseignant"){
                return($user->enseignant->id === $enseignant->id);
            }

            // Tester que l'etudiant etudie une matiere enseigne par cet enseignant
            if($user->fonction === "etudiant"){
                if(!empty($user->etudiant->classe->seances)){
                    $enseignants = [];
                    foreach($user->etudiant->classe->seances as $seance){
                        array_push($enseignants, $seance->matiere->enseignant);
                    }
                    return(in_array($enseignant, $enseignants));
                }
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
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Enseignant $enseignant)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Enseignant $enseignant)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Enseignant $enseignant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Enseignant $enseignant)
    {
        //
    }
}
