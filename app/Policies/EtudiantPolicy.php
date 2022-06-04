<?php

namespace App\Policies;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EtudiantPolicy
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
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Etudiant $etudiant)
    {
        if(!($user->fonction === "admin")){
            // Tester que l'enseignant enseigne cet etudiant
            if($user->fonction === "enseignant"){
                if(!empty($etudiant->classe->seances)){
                    $enseignants = [];
                    foreach($etudiant->classe->seances as $seance){
                        array_push($enseignants, $seance->matiere->enseignant_id);
                    }
                    return(in_array($user->enseignant->id, $enseignants));
                }
            }

            // Tester que c'est le meme etudiant
            if($user->fonction === "etudiant"){
                return $user->etudiant->id === $etudiant->id;
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
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Etudiant $etudiant)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Etudiant $etudiant)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Etudiant $etudiant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Etudiant $etudiant)
    {
        //
    }
}
