<?php

namespace Service\Mail\Contract;

interface MailContract
{

    public function send($to, $template, $subject);

}
