<?php

namespace App\Policies;

use App\Models\Matiere;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatierePolicy
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
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Matiere $matiere)
    {
        if(!($user->fonction === "admin")){
            // Tester que l'enseignant enseigne cette matiere
            if($user->fonction === "enseignant"){
                return($user->enseignant->matieres->contains($matiere));
            }

            // Tester que l'etudiant etudie cette matiere
            if($user->fonction === "etudiant"){
                if(!empty($user->etudiant->classe->seances)){
                    $matieres = [];
                    foreach($user->etudiant->classe->seances as $seance){
                        array_push($matieres, $seance->matiere_id);
                    }
                    return(in_array($matiere->id, $matieres));
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
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Matiere $matiere)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Matiere $matiere)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Matiere $matiere)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Matiere $matiere)
    {
        //
    }
}
