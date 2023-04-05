<?php

namespace Core\Listeners;

use Core\Events\BillingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Service\Boleto\BoletoService;

class GenerateBoleto
{

    protected $boletoService;
    /**
     * Create the event listener.
     */
    public function __construct(BoletoService $boletoServ)
    {
        $this->boletoService = $boletoServ;
    }

    /**
     * Handle the event.
     */
    public function handle(BillingCreated $event): void
    {
        $this->boletoService->generate($event->billing);
    }
}
