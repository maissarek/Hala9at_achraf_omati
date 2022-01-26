<?php

namespace App\Policies;

use App\Models\Etudiante;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class EtudiantePolicy
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
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Etudiante $etudiante)
    {

    $ens=DB::table('enseigante as e')
    ->join('ensetudhlk','e.id ','=',' ensetudhlk.id_ens')
    ->where('e.personne_id','=',$user->personne_id)
    ->andwhere('ensetudhlk.id_etud','=',$etudiante->id)
    ->get('id');

    /*select('select  e.id from enseigante as e JOIN ensetudhlk on e.id = ensetudhlk.id_ens
    where ((e.personne_id=?) and (ensetudhlk.id_etud=?))',[$user->personne_id,$etudiante->id]);
    echo($user->role_id === 1);*/
   echo(($ens));
    return(($user->role_id === 1)||(is_null($ens)));

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Etudiante $etudiante)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Etudiante $etudiante)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Etudiante $etudiante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Etudiante  $etudiante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Etudiante $etudiante)
    {
        //
    }
}
