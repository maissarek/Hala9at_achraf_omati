<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\{Enseigante,Etudiante,Halaka,Histetudiante,HistHalaka,Personne,Role,User};
use App\Policies\{EnseigantePolicy,EtudiantePolicy,HalakaPolicy,HistetudiantePolicy,HistHalakaPolicy,PersonnePolicy,RolePolicy,UserPolicy};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
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
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('', function ($user) {
        return $user->hasPermission('');
    });
 Gate::define('Dashboard_TeachersAbsencesGlobal', function ($user) {
        return $user->hasPermission('Dashboard_TeachersAbsencesGlobal');
    });
 Gate::define('Dashboard_StudentsAbsencesGlobal', function ($user) {
        return $user->hasPermission('Dashboard_StudentsAbsencesGlobal');
    });
 Gate::define('Dashboard_StudentsAbsences', function ($user) {
        return $user->hasPermission('Dashboard_StudentsAbsences');
    });
 Gate::define('Dashboard_TeacherByFonction', function ($user) {
        return $user->hasPermission('Dashboard_TeacherByFonction');
    });
 Gate::define('Dashboard_StudentByFonction', function ($user) {
        return $user->hasPermission('Dashboard_StudentByFonction');
    });

   
}
}
