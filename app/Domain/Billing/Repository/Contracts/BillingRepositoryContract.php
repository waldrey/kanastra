<?php

namespace Domain\Billing\Repository\Contracts;

interface BillingRepositoryContract
{

    public function all();
    public function insert($data);
    public function getByDebtId($debtId);
    public function update($dataUpdate, $billingId);

}
