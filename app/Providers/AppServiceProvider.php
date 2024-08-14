<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        debugbar()->enable();

        $topUser = Cache::remember('topUsers', now()->addMinutes(5), function () {
            return User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->take(5)->get();
        });
        View::share('topUsers', $topUser);
    }
}
