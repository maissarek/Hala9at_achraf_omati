<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Role;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
  use SoftDeletes;

   protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'mail', 'password','perso_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function person(){
        return $this->belongsTo(Personne::class);
    }
   
   public function hasPermissions($name){
  
        $hp= Role::join('permission_role','permission_role.role_id','role.id')
        ->leftjoin('permission','permission.id','permission_role.permission_id')
        ->leftjoin('role_user','role_user.role_id','role.id')
         ->leftjoin('users','users.id','role_user.user_id')
        ->where('permission.name','=',$name)
        ->where('users.id','=',$this->id)
        ->select('permission.id')
        ->count();
     return $hp;
     } 
    
}
