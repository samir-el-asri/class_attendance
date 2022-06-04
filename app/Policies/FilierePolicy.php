<?php

namespace App\Policies;

use App\Models\Filiere;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilierePolicy
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
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Filiere $filiere)
    {
        if(!($user->fonction === "admin")){
            // Tester que l'enseignant enseigne une matiere appartenant a cette filiere
            if($user->fonction === "enseignant"){
                if(!empty($user->enseignant->matieres)){
                    $filieres = [];
                    foreach($user->enseignant->matieres as $matiere){
                        array_push($filieres, $matiere->filiere);
                    }
                    return(in_array($filiere, $filieres));
                }
            }

            // Tester que l'etudiant est membre de cette filiere
            if($user->fonction === "etudiant"){
                return $user->etudiant->classe->filiere->id === $filiere->id;
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
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Filiere $filiere)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Filiere $filiere)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Filiere $filiere)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Filiere $filiere)
    {
        //
    }
}
