<?php

namespace App\Providers;

use App\Models\Turma;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
 
Gate::before(function ($user, $ability) {
    if($user->eAdmin())
    {
        return true;
    }
});

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     * 
     */

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ver-turma', function($user, Turma $turma )
        {
            return $user->id == $turma->user_id;
        });

        //
    }
}
