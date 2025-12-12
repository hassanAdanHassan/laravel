<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;



use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\CategoryModel;
use App\Policies\CategoryPolicy;

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
        $this->registerPolicies();

        Gate::define('viewAny', [CategoryPolicy::class, 'viewAny']);
        Gate::define('view', [CategoryPolicy::class, 'view']);
        Gate::define('create', [CategoryPolicy::class, 'create']);
        Gate::define('update', [CategoryPolicy::class, 'update']);
        Gate::define('delete', [CategoryPolicy::class, 'delete']);

    }
}
