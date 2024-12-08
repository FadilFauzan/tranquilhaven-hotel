<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });


        // Kirim data kategori ke partial view navbar
        View::composer('partials.navbar', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
