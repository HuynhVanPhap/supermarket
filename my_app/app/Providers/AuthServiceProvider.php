<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\OrderPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Order' => 'App\Policies\OrderPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manager', function (User $user) {
            return $user->role->value <= config('constraint.roles.admin');
        });
        Gate::define('owner', function (User $user) {
            return $user->role->value === config('constraint.roles.super');
        });
        Gate::define('private', function (User $user, string $email) {
            return ($user->role->value  <= config('constraint.roles.admin'))
                ? true
                : $user->email === $email;
        });
    }
}
