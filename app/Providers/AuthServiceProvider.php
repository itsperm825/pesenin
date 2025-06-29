<?php

namespace App\Providers;

use App\Models\User;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Mendefinisikan semua "izin akses" berdasarkan role
        Gate::define('is-admin', function(User $user) {
            return $user->role == 'admin';
        });

        Gate::define('is-mitra', function(User $user) {
            return $user->role == 'mitra';
        });

        Gate::define('is-pengguna', function(User $user) {
            return $user->role == 'pengguna';
        });
    }
}