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
 /*Gate::define('', function ($user) {
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
    });*/
 Gate::define('Dashboard_totalSkipStudentByMM', function ($user) {
        return $user->hasPermission('Dashboard_totalSkipStudentByMM');
    });
 Gate::define('Dashboard_totalNewStudentByMM', function ($user) {
        return $user->hasPermission('Dashboard_totalNewStudentByMM');
    });  
 Gate::define('Dashboard_total', function ($user) {
        return $user->hasPermission('Dashboard_total');
    });
 Gate::define('Dashboard_TotaletuByHlk', function ($user) {
        return $user->hasPermission('Dashboard_TotaletuByHlk');
    });
 Gate::define('Dashboard_TotalhlkByens', function ($user) {
        return $user->hasPermission('Dashboard_TotalhlkByens');
    });
 Gate::define('Dashboard_TotalHlkByGroup', function ($user) {
        return $user->hasPermission('Dashboard_TotalHlkByGroup');
    });
 Gate::define('Dashboard_totalSkipStudentByYY', function ($user) {
        return $user->hasPermission('Dashboard_totalSkipStudentByYY');
    });
 Gate::define('Dashboard_totalNewStudentByYY', function ($user) {
        return $user->hasPermission('Dashboard_totalNewStudentByYY');
    });
 Gate::define('Dashboard_StudentByHizb', function ($user) {
        return $user->hasPermission('Dashboard_StudentByHizb');
    });
 Gate::define('Dashboard_StudentByAge', function ($user) {
        return $user->hasPermission('Dashboard_StudentByAge');
    });
 Gate::define('Dashboard_TeacherByAge', function ($user) {
        return $user->hasPermission('Dashboard_TeacherByAge');
    });
 Gate::define('Dashboard_StudentByFonction', function ($user) {
        return $user->hasPermission('Dashboard_StudentByFonction');
    });
 Gate::define('Dashboard_TeacherByFonction', function ($user) {
        return $user->hasPermission('Dashboard_TeacherByFonction');
    });
 Gate::define('Dashboard_StudentByAhkam', function ($user) {
        return $user->hasPermission('Dashboard_StudentByAhkam');
    });
 Gate::define('Dashboard_RateLateStudents', function ($user) {
        return $user->hasPermission('Dashboard_RateLateStudents');
    });
 Gate::define('Dashboard_RateLateTeachers', function ($user) {
        return $user->hasPermission('Dashboard_RateLateTeachers');
    });
 Gate::define('Dashboard_TeachersAbsences', function ($user) {
        return $user->hasPermission('Dashboard_TeachersAbsences');
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
