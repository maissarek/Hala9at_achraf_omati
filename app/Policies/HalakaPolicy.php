<?php

namespace App\Policies;

use App\Models\Halaka;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class HalakaPolicy
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
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Halaka $halaka)
    {
     $ens=DB::table('enseigante as e')
    ->join('ensetudhlk','ensetudhlk.id_ens','=','e.id')
    ->where('e.personne_id','=',$user->personne_id)
    ->where('ensetudhlk.id_hlk','=',$halaka->id)
    ->get('e.id');
        return (($user->role_id === 1)||(!$ens->isEmpty()));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
           return $user->role_id === 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Halaka $halaka)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Halaka $halaka)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Halaka $halaka)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Halaka  $halaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Halaka $halaka)
    {
        //
    }
}
