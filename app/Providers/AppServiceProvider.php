<?php

namespace App\Providers;

// use Facade\FlareClient\View;
// use Illuminate\View\View;

use App\Models\Office;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function (View $view){
            $offices = Office::first();
            $view->with('office', $offices);
        });

        Gate::define('admin', function(User $user){
            return $user -> is_admin;
        });
    }
}
