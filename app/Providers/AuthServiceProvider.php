<?php

namespace App\Providers;

use App\Models\{Team,Enseigante,Etudiante,Halaka,Histetudiante,HistHalaka,Personne,Role,User};
use App\Policies\{TeamPolicy,EnseigantePolicy,EtudiantePolicy,HalakaPolicy,HistetudiantePolicy,HistHalakaPolicy,PersonnePolicy,RolePolicy,UserPolicy};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Enseigante::class => EnseigantePolicy::class,
        Etudiante::class => EtudiantePolicy::class,
        Halaka::class => HalakaPolicy::class,
        Histetudiante::class => HistetudiantePolicy::class,
        HistHalaka::class => HistHalakaPolicy::class,
        Personne::class => PersonnePolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
