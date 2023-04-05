<?php

namespace Service\Mail\Implementations;

use Service\Mail\Contract\MailContract;

class Mailfaker implements MailContract
{
    
    public function __construct()
    {
    }

    public function send($to, $template, $subject)
    {
        try {            
            //@TODO: Criar um sistema de output para esses logs
            dump('[EMAIL-SERVICE] Email ('. $subject .') enviado para cliente '. $to . ' notificando seu débito em aberto com a Kanastra');
        } catch (Exception $e) {
            dd($e);
        }
    }
}