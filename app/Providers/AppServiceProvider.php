<?php

namespace App\Providers;

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
    protected $policies = [
        \App\Models\Job::class => \App\Policies\JobPolicy::class,
    ];
    public function boot(): void
    {
        //
    }
}
