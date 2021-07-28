<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('auth', function () {
            return [
                'guest' => !auth()->check(),
                'user'  => auth()->user(),
            ];
        });

        Inertia::share('flash', function () {
            return [
                'success' => Session::get('success'),
            ];
        });
    }
}
