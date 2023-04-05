<?php

namespace Service\Boleto\Contract;

interface BoletoContract
{

    public function generateBoleto($billing);

}
