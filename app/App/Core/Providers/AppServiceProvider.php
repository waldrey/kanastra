<?php

namespace Core\Providers;

use Illuminate\Support\ServiceProvider;
use Service\Boleto\Implementations\Bowleto;
use Service\Boleto\BoletoService;
use Service\Mail\Implementations\Mailfaker;
use Service\Mail\MailService;

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

        $this->app->bind(
            'Service\Boleto\Contract\BoletoContract',
            'Service\Boleto\Implementations\Bowleto'
        );

        $this->app->bind(
            'Service\Mail\Contract\MailContract',
            'Service\Mail\Implementations\Mailfaker'
        );


        $this->app->bind('Service\Mail\MailService', function($app) {
            $mailfakerService = new Mailfaker();
            $api = new MailService($mailfakerService);

            return $api;
        });

        $this->app->bind('Service\Boleto\BoletoService', function($app) {
            $bowletoService = new Bowleto();
            $api = new BoletoService($bowletoService);

            return $api;
        });
    

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
