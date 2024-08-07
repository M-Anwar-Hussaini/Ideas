<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Gate::define('admin', function (User $user): bool {
            return $user->is_admin;
        });

        Gate::define('ideas.delete', function (User $user, Idea $idea) {
            return ($idea->user_id === $user->id) || $user->is_admin;
        });

        Gate::define('ideas.edit', function (User $user, Idea $idea) {
            return ($idea->user_id === $user->id) || $user->is_admin;
        });
    }
}
