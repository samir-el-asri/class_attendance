<?php

namespace App\Policies;

use App\Models\Seance;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeancePolicy
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
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Seance $seance)
    {
        if(!($user->fonction === "admin")){
            // Tester que l'enseignant enseigne la matiere de cette seance
            if($user->fonction === "enseignant"){
                return $user->enseignant->id == $seance->matiere->enseignant->id;
            }

            // Tester que l'etudiant est membre de classe de cette seance
            if($user->fonction === "etudiant"){
                return $user->etudiant->classe->id == $seance->classe->id;
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
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Seance $seance)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Seance $seance)
    {
        return $user->fonction === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Seance $seance)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Seance $seance)
    {
        //
    }
}
