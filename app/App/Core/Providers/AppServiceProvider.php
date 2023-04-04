<?php

namespace Core\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'Domain\Billing\Repository\Contracts\BillingRepositoryContract',
            'Domain\Billing\Repository\Eloquent\BillingRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
