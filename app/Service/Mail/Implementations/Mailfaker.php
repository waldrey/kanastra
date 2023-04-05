<?php

namespace Service\Mail\Implementations;

use Service\Mail\Contract\MailContract;
use Utils\Loggers\LoggerApplication;

class Mailfaker implements MailContract
{
    
    public function __construct()
    {
    }

    public function send($to, $template, $subject)
    {
        try {            
            LoggerApplication::register('[MAILFAKER] Email ('. $subject .') enviado para cliente '. $to . ' notificando seu débito em aberto com a Kanastra');
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}