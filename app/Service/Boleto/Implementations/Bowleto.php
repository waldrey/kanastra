<?php

namespace Service\Boleto\Implementations;

use Service\Boleto\Contract\BoletoContract;

class Bowleto implements BoletoContract
{
    public function __construct()
    {
    }

    public function generateBoleto($billing)
    {
        try {
            $boleto = [
                'codeBar' => rand(),
                'name' => $billing['name'],
                'assignor' => 'Kanastra',
                'dueDate' => $billing['debtDueDate'],
            ];

            //@TODO: Criar um sistema de output para esses logs
            dump('[BOLETO-SERVICE] Criado um boleto para o cliente ' . $boleto['name'] .' com código de barras em ' . $boleto['codeBar'] . ' com vencimento para ' . $boleto['dueDate']);
        } catch (Exception $e) {
            dd($e);
        }

        return $boleto;
    }
}