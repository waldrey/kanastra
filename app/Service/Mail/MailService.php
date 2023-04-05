<?php

namespace Service\Mail;

use Service\Mail\Contract\MailContract;


class MailService
{
    protected $service;

    public function __construct(MailContract $mailerSdk)
    {
        $this->service = $mailerSdk;
    }

    public function send($to, $template, $subject)
    {
        $this->service->send($to, $template, $subject);
    }
}
