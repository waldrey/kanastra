<?php

namespace App\Core\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'Domain\Billing\Repository\Contract\BillingRepositoryContract',
            'Domain\Billing\Repository\Eloquent'
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
