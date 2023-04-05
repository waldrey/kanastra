<?php

namespace Service\Boleto;

use Carbon\Carbon;
use Service\Boleto\Contract\BoletoContract;

class BoletoService
{

    protected $service;

    public function __construct(BoletoContract $boletoSdk)
    {
        $this->service = $boletoSdk;
    }

    public function generate($dataBilling)
    {
        return $this->service->generateBoleto($dataBilling);
    }
}
