<?php

namespace Core\Listeners;

use Core\Events\BillingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Service\Mail\MailService;

class SendEmail
{
    protected $mailerService;
    /**
     * Create the event listener.
     */
    public function __construct(MailService $mailService)
    {
        $this->mailerService = $mailService;
    }

    /**
     * Handle the event.
     */
    public function handle(BillingCreated $event): void
    {
        $this->mailerService->send($event->billing['email'], 'email.boleto-generate', 'Seu boleto chegou! :)');
    }
}
