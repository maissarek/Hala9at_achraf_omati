<?php

namespace App\Policies;
use Illuminate\Support\Facades\DB;

use App\Models\HistHalaka;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HistHalakaPolicy
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
     * @param  \App\Models\HistHalaka  $histHalaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, HistHalaka $histHalaka)
    {

     $ens=DB::table('enseigante as e')
    ->join('ensetudhlk','ensetudhlk.id_ens','=','e.id')
    ->where('e.personne_id','=',$user->personne_id)
    ->where('ensetudhlk.id_hlk','=',$histHalaka->id)
    ->get('e.id');

    
    return(($user->role_id === 1)||(!$ens->isEmpty()));

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
           return $user->role_id === 1 || $user->role_id === 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HistHalaka  $histHalaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, HistHalaka $histHalaka)
    {
        $ens=DB::table('enseigante as e')
    ->join('ensetudhlk','ensetudhlk.id_ens','=','e.id')
    ->join('histetudiante','histetudiante.ensetudhlk_id','=','ensetudhlk.id')
    ->join('HistHalaka','HistHalaka.id','=','histetudiante.HistHalaka_id')
    ->where('e.personne_id','=',$user->personne_id)
    ->where('HistHalaka.id','=',$histHalaka->id)
    ->get('e.id');
     return(($user->role_id === 1)||(!$ens->isEmpty()));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HistHalaka  $histHalaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, HistHalaka $histHalaka)
    {
         $ens=DB::table('enseigante as e')
    ->join('ensetudhlk','ensetudhlk.id_ens','=','e.id')
    ->join('histetudiante','histetudiante.ensetudhlk_id','=','ensetudhlk.id')
    ->join('HistHalaka','HistHalaka.id','=','histetudiante.HistHalaka_id')
    ->where('e.personne_id','=',$user->personne_id)
    ->where('HistHalaka.id','=',$histHalaka->id)
    ->get('e.id');
     return(($user->role_id === 1)||(!$ens->isEmpty()));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HistHalaka  $histHalaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, HistHalaka $histHalaka)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HistHalaka  $histHalaka
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, HistHalaka $histHalaka)
    {
        //
    }
}
